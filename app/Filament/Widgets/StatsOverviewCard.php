<?php

namespace App\Filament\Widgets;

use App\Models\{User};
use Filament\Support\Enums\IconPosition;
use Illuminate\Support\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewCard extends BaseWidget
{
    use InteractsWithPageFilters;
    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'];
        $endDate = $this->filters['endDate'];

        $users = User::whereBetween('created_at', [$startDate, $endDate])->count();

        return [
            Stat::make('New Users', $users)
                ->description('New Users that have joined')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 40])
                ->color('success'),
        ];
    }
}
