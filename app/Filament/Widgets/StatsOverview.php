<?php

namespace App\Filament\Widgets;

use App\Models\{
    Attraction,
    Activity,
    Destination,
    Transportation,
};
use Illuminate\Support\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;
    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'];
        $endDate = $this->filters['endDate'];

        $attractions = Attraction::whereBetween('created_at', [$startDate, $endDate])->count();
        $activities = Activity::whereBetween('created_at', [$startDate, $endDate])->count();
        $destinations = Destination::whereBetween('created_at', [$startDate, $endDate])->count();
        $transportations = Transportation::whereBetween('created_at', [$startDate, $endDate])->count();

        return [
            Stat::make('Total Attractions', $attractions),
            Stat::make('Total Activities', $activities),
            Stat::make('Total Destinations', $destinations),
            Stat::make('Total Transportations', $transportations),
        ];
    }
}
