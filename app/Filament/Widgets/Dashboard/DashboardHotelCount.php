<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\Bedroom;
use App\Models\Comment;
use App\Models\Guest;
use App\Models\Hotel;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardHotelCount extends BaseWidget
{

    protected static ?string $pollingInterval = '60s';

    protected function getCards(): array
    {
        return [
            Card::make('Total de habitaciones', Bedroom::count() )
                ->icon('heroicon-o-bookmark')
                ->description('Muestra el total de habitaciones en el sitio')
                ->descriptionIcon('heroicon-o-bookmark')
                ->chart([0,Bedroom::count() ]),
            Card::make('Numero de habitaciones Disponibles', Bedroom::where('status', 'Disponible')->count() )
                ->description('Muestra el total de habitaciones disponibles en el sitio')
                ->descriptionColor('success')
                ->chart([0,Bedroom::where('status', 'Disponible')->count()]),
            Card::make('Numero de habitaciones Ocupadas', Bedroom::where('status', 'Ocupada')->count() )
                ->description('Muestra el total de habitaciones ocupadas en el sitio')
                ->descriptionColor('warning')
                ->chart([0,Bedroom::where('status', 'Ocupada')->count()]),
            Card::make('Numero de habitaciones Fuera de Servicio', Bedroom::where('status', 'Fuera de Servicio')->count() )
                ->description('Muestra el total de habitaciones Fuera de servicio')
                ->descriptionColor('danger')
                ->chart([0, Bedroom::where('status', 'Fuera de Servicio')->count()]),
            Card::make('Numero de Hostales', Hotel::where('status', 'Activo')->count())
                ->icon('heroicon-o-library')
                ->description('Muestra el total de hostales activos del sitio')
                ->descriptionIcon('heroicon-o-bookmark')
                ->chart([0, Hotel::where('status', 'Activo')->count()]),
            Card::make('Numero de Inquilinos', Guest::count() )
                ->icon('heroicon-o-user-group')
                ->description('Muestra el total de inquilinos del sitio')
                ->descriptionIcon('heroicon-o-bookmark')
                ->chart([0,Guest::count() ]),
            Card::make('Numero de Comentarios', Comment::where('status', '1')->count())
                ->icon('heroicon-o-check-circle')
                ->description('Muestra el total de comentarios activos del sitio')
                ->descriptionIcon('heroicon-o-bookmark')
                ->chart([0, Comment::where('status', '1')->count()])
        ];
    }
}
