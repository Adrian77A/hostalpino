<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\Bedroom;
use App\Models\Comment;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardHotelCount extends BaseWidget
{

    protected static ?string $pollingInterval = '60s';

    protected function getCards(): array
    {
        return [
            Card::make('Numero de Usuarios', User::count() )
                ->icon('heroicon-o-user-group')
                ->description('Muestra el total de usuarios')
                ->descriptionIcon('heroicon-o-bookmark')
                ->chart([0,User::count() ]),
            Card::make('Numero de Productos', Product::where('status', 'Disponible')->count())
                ->icon('heroicon-o-check-circle')
                ->description('Muestra el total de Productos disponibles del sitio')
                ->descriptionIcon('heroicon-o-bookmark')
                ->chart([0, Product::where('status', 'Disponible')->count()]),
            Card::make('Numero de Productos Inactivos', Product::where('status', 'Inactivo')->count())
                ->icon('heroicon-o-check-circle')
                ->description('Muestra el total de Productos inactivos')
                ->descriptionIcon('heroicon-o-bookmark')
                ->chart([0, Product::where('status', 'Disponible')->count()])
        ];
    }
}
