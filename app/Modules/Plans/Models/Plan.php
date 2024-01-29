<?php

namespace Plans\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Properties\Models\Property;


class Plan extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['name','content'];
    protected $fillable = ['status','created_by' , 'subscription_type' , 'price','wash_number'];

    protected $table = 'plans';

}
