<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\Filter;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationLabel = 'Contactos';

    protected static ?string $navigationGroup = 'Pagina Web';

    protected static function getNavigationLabel(): string
    {
        return __('Contacto');
    }

    public static function getModelLabel(): string
    {
        return __('Contactos');
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Contactos')
                ->description('Usuarios que quieren contactarnos')
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email(),
                    Textarea::make('description')
                    ->required(),
                    Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(['0'=> 'Invalido', '2'=> 'Pendiente', '1' => 'Acceptado'])
                    ->searchable()
                    ->required(),
                    Forms\Components\TextInput::make('phone')
                    ->label('Telefono')
                    ->required()
                    ->tel(),
                    DateTimePicker::make('date')
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nombre')
                ->searchable(query: function(Builder $query, string $search): Builder {
                    return $query
                    ->where('name', 'like', "%{$search}%");
                }),
                Tables\Columns\TextColumn::make('phone')->label('Telefono'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                SelectColumn::make('status')
                ->options([
                    '0' => 'Invalido',
                    '2' => 'Pendiente',
                    '1' => 'Aceptado',
                ]),
                Tables\Columns\TextColumn::make('date')->label('Fecha que escribió'),
            ])
            ->filters([
                Filter::make('name')->label('Nombre'),
                Filter::make('email')->label('Email'),
                Filter::make('date')->label('Fecha que escribió'),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'view' => Pages\ViewContact::route('/{record}'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }    
}
