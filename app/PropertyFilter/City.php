<?php

namespace App\PropertyFilter;
use Closure;

class City
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        if (request()->has('city')) {
            $search = request('city');
            if ($search != '') {
                $data->where('city_id',$search);
                return $data;
            }
        }
        return $data;
    }
}