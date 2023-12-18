<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\Administration;
use Filament\Widgets\BarChartWidget;

// class AdministrationChart extends BarChartWidget
class AdministrationChart 
{
    protected static ?string $heading = 'Chart';

    protected static ?string $pollingInterval = '60s';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {

        return [
            'datasets' => [
                [
                    'label' => 'Gancias por Hotel',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
