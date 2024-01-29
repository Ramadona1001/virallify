<?php

namespace App\PropertyFilter;
use Closure;

class Area
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        if (request()->has('area')) {
            $search = request('area');
            if ($search != '') {
                $data->where('area_id',$search);
                return $data;
            }
        }
        return $data;
    }
}