<?php

namespace Services\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Service extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['name','content'];
    protected $fillable = ['status','created_by' ,'image'];

    protected $table = 'services';

}
