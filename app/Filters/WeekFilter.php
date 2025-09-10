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

        $start = $date->startOfWeek();
        $end   = $date->endOfWeek();

        // Grab all bookings that overlap the week
        $query->where('end_time', '>=', $start)
            ->where('start_time', '<=', $end);
    }
}
