<?php

namespace App\PropertyFilter;
use Closure;

class UnitType
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        if (request()->has('unit_type')) {
            $search = request('unit_type');
            if ($search != '') {
                $data->where('unit_type_id',$search);
                return $data;
            }
        }
        return $data;
    }
}