<?php
namespace App\Filters;

use Carbon\CarbonInterface;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Carbon\CarbonImmutable;

class WeekFilter implements Filter
{
    /**
     * @param Builder $query
     * @param $value
     * @param string $property
     * @return mixed|void
     */
    public function __invoke(Builder $query, $value, string $property)
    {
        // $value is the date sent from frontend
        $date = CarbonImmutable::parse($value);

        $start = $date->startOfWeek(CarbonInterface::MONDAY);
        $end   = $date->endOfWeek(CarbonInterface::SUNDAY);

        $query->where(function ($q) use ($start, $end) {
            $q->whereBetween('start_time', [$start, $end])
                ->orWhereBetween('end_time', [$start, $end]);
        });
    }
}
