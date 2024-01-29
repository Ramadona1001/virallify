<?php

namespace App\PropertyFilter;
use Closure;

class Country
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        if (request()->has('country')) {
            $search = request('country');
            if ($search != '') {
                $data->where('country_id',$search);
                return $data;
            }
        }
        return $data;
    }
}