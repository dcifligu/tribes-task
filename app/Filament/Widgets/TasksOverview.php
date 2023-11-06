<?php

namespace App\Filament\Widgets;

use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use App\Models\PreviousCount;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TasksOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $currentTaskCount = Task::count();

        // Get the previous task count from your storage or database.
        $previousCountRecord = PreviousCount::where('countable_type', 'tasks')
            ->orderBy('created_at', 'desc')
            ->first();

        $previousTaskCount = $previousCountRecord ? $previousCountRecord->count : 0;

        // Calculate the percentage change.
        $percentageChange = 0;
        if ($previousTaskCount > 0) {
            $percentageChange = round(($currentTaskCount - $previousTaskCount) / $previousTaskCount) * 100;
        }

        $description = 'No change in the number of tasks.';
        $descriptionIcon = 'heroicon-m-minus-circle';
        $color = 'neutral';

        if ($percentageChange > 0) {
            $description = 'There has been a ' . abs($percentageChange) . '% increase in the number of tasks.';
            $descriptionIcon = 'heroicon-m-arrow-trending-up';
            $color = 'success';
        } elseif ($percentageChange < 0) {
            $description = 'There has been a ' . abs($percentageChange) . '% decrease in the number of tasks.';
            $descriptionIcon = 'heroicon-m-arrow-trending-down';
            $color = 'error';
        }

        return [
            Stat::make(label: 'Total task number', value: $currentTaskCount)
                ->description(description: $description)
                ->descriptionIcon(icon: $descriptionIcon)
                ->color(color: $color)
                ->chart([7, 3, 4, 5, 6, 3, 1, 5, 7]),

            Stat::make(label: 'Total number of Tags', value: Tag::count())
                ->descriptionIcon(icon: 'heroicon-m-arrow-trending-up')
                ->color(color: 'warning'),

            Stat::make(label: 'Total number of non-admin users', value: User::where('user_type', 'normal')->count())
        ];
    }
}
