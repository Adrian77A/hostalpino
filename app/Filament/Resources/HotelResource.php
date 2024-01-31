<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelResource\Pages;
use App\Filament\Resources\HotelResource\RelationManagers;
use App\Models\Hotel;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\Filter;

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';

    protected static ?string $navigationLabel = 'Hostal';

    protected static ?string $navigationGroup = 'Administración';

    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->label('Description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label('Dirección')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Estatus')
                    ->options(['Activo' => 'Activo', 'Inactivo'=> 'Inactivo'])
                    ->searchable()
                    ->required(),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nombre'),
                Tables\Columns\TextColumn::make('description')->label('Descripción'),
                Tables\Columns\TextColumn::make('address')->label('Dirección'),
                Tables\Columns\TextColumn::make('status')->label('Estatus'),
                Tables\Columns\TextColumn::make('created_at')->label('Creación')
                    ->dateTime(),
            ])
            ->filters([
                Filter::make('name')->label('Nombre'),
                Filter::make('status')->label('Estatus'),
                Filter::make('address')->label('Dirección'),
                Filter::make('created_at')->label('Creación')
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
            'index' => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotel::route('/create'),
            'edit' => Pages\EditHotel::route('/{record}/edit'),
        ];
    }    
}
