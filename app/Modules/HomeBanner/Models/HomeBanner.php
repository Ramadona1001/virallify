<?php

namespace HomeBanner\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class HomeBanner extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['content','title','btn1_text','btn2_text','btn1_link','btn2_link'];
    protected $fillable = ['image','created_by'];

    protected $table = 'home_banner';
}
