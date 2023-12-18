<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
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

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $navigationLabel = 'Comentarios';

    protected static ?string $navigationGroup = 'Pagina Web';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Comentarios')
                ->description('Comentarios sobre la pagina')
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('title')
                    ->label('Titulo')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email(),
                    Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(['0'=> 'Invalido', '2'=> 'Pendiente', '1' => 'Acceptado'])
                    ->searchable()
                    ->required(),
                    Textarea::make('description')
                    ->required(),
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
                Tables\Columns\TextColumn::make('title')->label('Titulo'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                SelectColumn::make('status')
                ->options([
                    '0' => 'Invalido',
                    '2' => 'Pendiente',
                    '1' => 'Aceptado',
                ]),
            ])
            ->filters([
                Filter::make('name')->label('Nombre'),
                Filter::make('title')->label('Titulo'),
                Filter::make('email')->label('Email'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'view' => Pages\ViewComment::route('/{record}'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }    
}
