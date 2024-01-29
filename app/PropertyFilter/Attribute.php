<?php

namespace App\PropertyFilter;
use Closure;
use Properties\Models\Property;

class Attribute
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        if (request()->has('attribute')) {
            $search = request('attribute');
            
            if (is_array($search)) {
                // (array)json_decode(Property::findOrfail(2)->unit_type_attributes)
                if (count($search) > 0) {
                    foreach ($search as $key => $value) {
                        $data->whereJsonContains('unit_type_attributes',[$key,$value]);
                        dd($data->toSql());
                        return $data;
                    }
                }
            }
        }
        return $data;
    }
}