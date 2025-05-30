<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Nova;
use App\Models\User;

class TotalUsers extends Value
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, User::class)
            ->format([
            'thousandSeparated' => true,
        ]);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        // return [
        //     30 => Nova::__('30 Days'),
        //     60 => Nova::__('60 Days'),
        //     365 => Nova::__('365 Days'),
        //     'TODAY' => Nova::__('Today'),
        //     'MTD' => Nova::__('Month To Date'),
        //     'QTD' => Nova::__('Quarter To Date'),
        //     'YTD' => Nova::__('Year To Date'),
        // ];
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'totalUsers';
    }
}
