<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ToggleColumn;
use App\Models\Hotel;
use Filament\Forms\Components\Select;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right';

    protected static ?string $navigationLabel = 'Banner';

    protected static ?string $navigationGroup = 'Pagina Web';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(2)
                ->schema([
                    TextInput::make('title')->label('Nombre')
                            ->required()
                            ->maxLength(255),
                    TextInput::make('description')->label('Descripción')
                            ->required()
                            ->maxLength(255),
                    FileUpload::make('img')->label('Imagen')
                            ->image()
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->maxFiles(1)
                            ->enableOpen(),
                    Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(['Inactivo' => 'Inactivo', 'Activo'=> 'Activo'])
                    ->searchable()
                    ->required(),
                    Toggle::make('show')->label('Mostrar')->required(),
                    TextInput::make('order')
                        ->unique(ignoreRecord: true)
                        ->label('Orden a mostrar')
                        ->required()
                        ->maxLength(3),
                    ]),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Nombre'),
                ImageColumn::make('img')->label('Imagen'),
                SelectColumn::make('status')
                ->options([
                    'Inactivo' => 'Inactivo',
                    'Activo' => 'Activo',
                ]),
                ToggleColumn::make('show')->label('Mostrar'),
                Tables\Columns\TextColumn::make('order')->label('Orden a mostrar'),
            ])
            ->filters([
                Filter::make('name')->label('Nombre'),
                Filter::make('status')->label('Estatus'),
                Filter::make('show')->label('Mostrar'),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }    
}
