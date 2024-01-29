<?php

namespace Footer\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Footer extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['content','copy_rights'];
    protected $fillable = ['status','logo','created_by'];

    protected $table = 'footer';
}
