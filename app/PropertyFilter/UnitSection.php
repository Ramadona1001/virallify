<?php

namespace App\PropertyFilter;
use Closure;

class UnitSection
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        if (request()->has('unit_section')) {
            $search = request('unit_section');
            if ($search != '') {
                $data->where('unit_section_id',$search);
                return $data;
            }
        }
        return $data;
    }
}