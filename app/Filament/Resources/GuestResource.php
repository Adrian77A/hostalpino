<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Filament\Resources\GuestResource\RelationManagers;
use App\Models\Bedroom;
use App\Models\Guest;
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
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Grid;
use Closure;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Notifications\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Inquilinos';

    protected static ?string $navigationGroup = 'Administración';
    
    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
            return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('hotel_id')
                            ->label('Selecciona el Hostal')
                            ->options(Hotel::where('status', 'Activo')->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('bedroom_id')
                            ->label('Habitación')
                            ->relationship('bedroom', 'name', fn (Builder $query, callable $get) => $query->where('status', 'Disponible')->where('hotel_id', $get('hotel_id')))
                            ->preload()
                            ->reactive()
                            ->searchable(),
                        Forms\Components\TextInput::make('name')->label('Nombre')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')->label('Telefono')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone_alternative')->label('Telefono Alternativo')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('job')->label('Dedicación')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('status')
                            ->label('Status Pago')
                            ->options(['Completo' => 'Pago completo', 'Incompleto' => 'Pago incompleto', 'Curso' => 'Pago en curso'])
                            ->searchable()
                            ->required(),
                        DatePicker::make('date_start')->label('Fecha inicio contrato'),
                        FileUpload::make('img')
                            ->image()
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->minFiles(0)
                            ->maxFiles(2)
                            ->label('Fotografias Contrato')
                            ->enableOpen(), 
                        ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bedroom.hotel.name')->label('Nombre Hostal'),
                Tables\Columns\TextColumn::make('bedroom.name')->label('Nombre habitación')
                ->sortable(), 
                Tables\Columns\TextColumn::make('name')
                ->searchable(query: function(Builder $query, string $search): Builder {
                    return $query
                    ->where('name', 'like', "%{$search}%");
                })
                ->sortable()
                ->label('Nombre'), 
                Tables\Columns\TextColumn::make('date_start')->label('Fecha firmo contrató')->sortable(), 
                Tables\Columns\TextColumn::make('date_log_start')->label('Proximó pago')->sortable(),
                BadgeColumn::make('status')->label('Estatus Pago')
                ->colors([
                    'primary',
                    'warning' => static fn ($state): bool => $state === 'Pago en curso',
                    'success' => static fn ($state): bool => $state === 'Completo',
                    'danger' => static fn ($state): bool => $state === 'Incompleto',
                ])
                ->sortable()
                ->searchable(query: function(Builder $query, string $search): Builder {
                    return $query
                    ->where('status', 'like', "%{$search}%");
                }), 
                Tables\Columns\TextColumn::make('phone')->label('Telefono')
                ->sortable()
                ->searchable(query: function(Builder $query, string $search): Builder {
                    return $query
                    ->where('phone', 'like', "%{$search}%");
                }), 
                Tables\Columns\TextColumn::make('job')->label('Dedicación'),
            ])
            ->filters([
                Filter::make('bedroom.name')->label('Nombre de Habitacion'),
                Filter::make('name')->label('Nombre Inquilino'),
                Filter::make('job')->label('Dedicación'),
                Filter::make('status')->label('Estatus'),
                Filter::make('date_log_start')->label('Proximó pago'),
            ])
            ->actions([
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
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }    
}
