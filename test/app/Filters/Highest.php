<?php

namespace App\Filters;

use Closure;

class Highest
{
    public function handle($data, Closure $next)
    {
        print_r($data->max('sales'));
        exit();
    }
}
