<?php

namespace App\PropertyFilter;
use Closure;

class Title
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        $search = request()->title;
        if (request()->has('title')) {
            if ($search != '') {
                $data->whereTranslationLike('title','%'.$search.'%');
                return $data;
            }
        }
        return $data;
    }
}