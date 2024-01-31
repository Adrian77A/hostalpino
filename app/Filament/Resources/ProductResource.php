<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Bedroom;
use App\Models\Hotel;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\Section;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $activeNavigationIcon = 'heroicon-s-cursor-click';

    protected static function getNavigationLabel(): string
    {
        return __('Producto');
    }

    public static function getModelLabel(): string
    {
        return __('Productos');
    }

    protected static function getNavigationGroup(): string
    {
        return __('Productos');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Productos'))
                ->description(__('Descripción'))
                ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Selecciona el Usuario')
                    ->options(User::pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Textarea::make('body')
                    ->label('Descripción')
                    ->rows(5)
                    ->cols(5)
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Estatus')
                    ->options(['Disponible' => 'Disponible', 'Inactivo'=> 'Inactivo'])
                    ->searchable()
                    ->required(),
                Toggle::make('show_page')
                    ->label('Mostrar')
                    ->onColor('success')
                    ->offColor('danger')
                    ->inline(true)
                    ->required(),
                FileUpload::make('img')
                    ->image()
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->multiple()
                    ->minFiles(0)
                    ->maxFiles(5)
                    ->label('Imagenes')
                    ->enableOpen(),
            FileUpload::make('video')
                // ->required()
                ->label('Video')
                // ->enablePreview()
                ->preserveFilenames()
                ->maxSize(20000)
                ->enableOpen()
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Usuario'),
                Tables\Columns\TextColumn::make('name')->label('Nombre')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('body')->label('Descripción'),
                BadgeColumn::make('status')
                    ->label('Estatus')
                    ->colors([
                        'primary',
                        'warning' => static fn ($state): bool => $state === 'Inactivo',
                        'success' => static fn ($state): bool => $state === 'Disponible',
                ]),
            ])
            ->filters([
                Filter::make('name')->label('Nombre'),
                Filter::make('status')->label('Estatus'),
                Filter::make('created_at')->label('Creación'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
