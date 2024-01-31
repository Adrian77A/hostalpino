<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdministrationResource\Pages;
use App\Filament\Resources\AdministrationResource\RelationManagers;
use App\Models\Administration;
use App\Models\Hotel;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Closure;


class AdministrationResource extends Resource
{
    protected static ?string $model = Administration::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationLabel = 'Administración';

    protected static ?string $navigationGroup = 'Calcular ganacias';

    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Section::make('Hotel')
                        ->description('Información del período')
                        ->schema([
                                Forms\Components\Select::make('hotel_id')
                                    ->label('Selecciona el Hostal')
                                    ->options(Hotel::where('status', 'Activo')->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                                DatePicker::make('date_month_start')->label('Fecha inicio mes'),
                                DatePicker::make('date_month_finish')->label('Fecha termina mes'),
                                Forms\Components\TextInput::make('profit_total')
                                ->label('Cantidad Reunida')
                                ->required()
                                ->reactive()
                                ->numeric()
                                ->maxLength(255),
                    ]),
                    Section::make('Gasos del Mantenimiento')
                        ->description('Ingresa los pagos sobre servicios')
                        ->schema([
                            Forms\Components\TextInput::make('water')
                                ->label('Costo Agua')
                                ->numeric()
                                ->required()
                                ->reactive()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('intranet')
                                ->label('Costo internet')
                                ->numeric()
                                ->required()
                                ->reactive()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('gas')
                                ->label('Costo Gas')
                                ->numeric()
                                ->reactive()
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('electric_power')
                                ->label('Costo Electricidad')
                                ->numeric()
                                ->required()
                                ->reactive()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('maintenance')
                                ->label('Costo Mantenimiento')
                                ->numeric()
                                ->reactive()
                                ->required()
                                ->afterStateUpdated(function (Closure $get, $set) {
                                    $sum = 0;
                                    $water = $get('water');
                                    $intranet = $get('intranet');
                                    $gas = $get('gas');
                                    $electric_power = $get('electric_power');
                                    $maintenance = $get('maintenance');
                                    $profit_total = $get('profit_total');
                                    
                                    if(isset($water) && isset($intranet) && isset($gas)  && isset($electric_power) && isset($maintenance)  ){
                                        $sum = (int)$water +(int)$intranet + (int)$gas + (int)$electric_power + (int)$maintenance; 
                                    }
                                    $set('other_amount', $sum);
                                    if(isset($profit_total)){
                                        $total_value = (int)$profit_total - (int)$sum ;
                                        $set('profit_amount', $total_value);
                                    }
                                })
                                ->maxLength(255),
                            Forms\Components\TextInput::make('other_amount')
                                ->label('Suma de Gastos')
                                ->reactive()
                                ->disabled()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('profit_amount')
                                ->label('Ganancia')
                                ->required()
                                ->reactive()
                                ->disabled()
                                ->maxLength(255),
                    ])->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hotel.name')->label('Hostal')->sortable(),
                Tables\Columns\TextColumn::make('date_month_start')->label('Fecha inicio mes')
                ->searchable(query: function(Builder $query, string $search): Builder {
                    return $query
                    ->where('date_month_start', 'like', "%{$search}%");
                })
                ->sortable(),
                Tables\Columns\TextColumn::make('date_month_finish')->label('Fecha termina mes')->sortable(),
                Tables\Columns\TextColumn::make('profit_total')->label('Total')->sortable(),
                Tables\Columns\TextColumn::make('profit_amount')->label('Ganancia')->sortable(),
            ])
            ->filters([
                Filter::make('hotel.name')->label('Nombre Hostal'),
                Filter::make('date_month_start')->label('Fecha inicio mes'),
                Filter::make('date_month_finish')->label('Fecha termina mes'),
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
            'index' => Pages\ListAdministrations::route('/'),
            'create' => Pages\CreateAdministration::route('/create'),
            'edit' => Pages\EditAdministration::route('/{record}/edit'),
        ];
    }    
}
