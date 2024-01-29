<?php

namespace Coupons\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Coupon extends Model
{
    protected $fillable = ['code','discount_value' ,'discount_type'];
    protected $table = 'coupons';
}
