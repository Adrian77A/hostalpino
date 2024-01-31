<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role as RoleModel;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Card;
use App\Models\Role;
class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $activeNavigationIcon = 'heroicon-s-cursor-click';

    protected static function getNavigationGroup(): string
    {
        return __('Usuarios');
    }

    protected static function getNavigationLabel(): string
    {
        return __('Rol');
    }

    public static function getModelLabel(): string
    {
        return __('Roles');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([

                TextInput::make('name')
                ->label('Nombre')
                ->minLength(2)
                ->maxLength(255)
                ->required()
                ->unique(ignoreRecord: true), 
                Select::make('permissions')
                    ->label('Permisos')
                    ->multiple()
                    ->relationship('permissions', 'name')
                ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')
            ])
            ->filters([
                //
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }    

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('name', '!=', 'Admin')->where('name', '!=', 'Super Admin');
    }

}
