<?php

namespace App\PropertyFilter;
use Closure;

class Amount
{
    
    public function handle($request , Closure $next)
    {
        $data = $next($request);

        if (!request()->has('amount_min') || !request()->has('amount_max')) {
            return $data;
        }else{
            $data->whereBetween('amount',[request('amount_min'),request('amount_max')]);
            return $data;
        }
    }

}