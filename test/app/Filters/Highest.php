<?php

namespace App\Filters;

use Closure;

use function PHPSTORM_META\map;

class Highest
{
    public function handle($data, Closure $next)
    {



        $results =  $data->pluck('sales')
            ->flatten(1)
            ->groupBy('customer')
            ->map(function ($groupedSales, $customer) {
                return $groupedSales->sum('order_total');
            })
            ->sort()
            ->reverse()
            ->keys()
            ->first();






        return $data->where('sales.1.customer', $results)->pluck('name')->first();
    }
}
