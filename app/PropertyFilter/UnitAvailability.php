<?php

namespace App\PropertyFilter;
use Closure;

class UnitAvailability
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        if (request()->has('unit_availability')) {
            $search = request('unit_availability');
            if ($search != '') {
                $data->where('unit_availability_id',$search);
                return $data;
            }
        }
        return $data;
    }
}