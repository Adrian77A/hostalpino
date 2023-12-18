<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BedroomResource\Pages;
use App\Filament\Resources\BedroomResource\RelationManagers;
use App\Models\Bedroom;
use App\Models\Hotel;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\BadgeColumn;

class BedroomResource extends Resource
{
    protected static ?string $model = Bedroom::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    protected static ?string $navigationLabel = 'Habitaciones';

    protected static ?string $navigationGroup = 'Administración';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('hotel_id')
                    ->label('Selecciona el Hostal')
                    ->options(Hotel::where('status', 'Activo')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->rows(5)
                    ->cols(5)
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(['Disponible' => 'Disponible', 'Ocupada'=> 'Ocupada', 'Fuera de Servicio'=> 'Fuera de Servicio'])
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('pay')
                    ->label('Precio de la habitación')
                    ->required()
                    ->numeric()
                    ->maxLength(255),
                RichEditor::make('web_phrase'),
                Toggle::make('show_page')
                    ->onColor('success')
                    ->offColor('danger')
                    ->inline(false),
                FileUpload::make('img')
                    ->image()
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->multiple()
                    ->minFiles(0)
                    ->maxFiles(5)
                    ->enableOpen(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hotel.name')->label('Hostal'),
                Tables\Columns\TextColumn::make('name')->label('Nombre')
                ->searchable(query: function(Builder $query, string $search): Builder {
                    return $query
                    ->where('name', 'like', "%{$search}%");
                }),
                Tables\Columns\TextColumn::make('description')->label('Descripción'),
                BadgeColumn::make('status')
                    ->colors([
                        'primary',
                        'warning' => static fn ($state): bool => $state === 'Ocupada',
                        'success' => static fn ($state): bool => $state === 'Disponible',
                        'danger' => static fn ($state): bool => $state === 'Fuera de Servicio',
                    ]),

                Tables\Columns\TextColumn::make('pay')->label('Costo de Habitación'), 
            ])
            ->filters([
                Filter::make('name')->label('Nombre'),
                Filter::make('status')->label('Estatus'),
                Filter::make('created_at')->label('Creación'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBedrooms::route('/'),
            'create' => Pages\CreateBedroom::route('/create'),
            'edit' => Pages\EditBedroom::route('/{record}/edit'),
        ];
    }    
}
