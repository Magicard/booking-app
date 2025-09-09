<?php
namespace App\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Carbon\CarbonImmutable;

class WeekFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        // $value is the date sent from frontend
        $date = CarbonImmutable::parse($value);
        $start = $date->startOfWeek(CarbonImmutable::MONDAY);
        $end   = $date->endOfWeek(CarbonImmutable::SUNDAY);

        $query->where(function ($q) use ($start, $end) {
            $q->whereBetween('start_time', [$start, $end])
                ->orWhereBetween('end_time', [$start, $end])
                ->orWhere(function ($q2) use ($start, $end) {
                    $q2->where('start_time', '<', $start)
                        ->where('end_time', '>', $end);
                });
        });
    }
}
