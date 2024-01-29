<?php

namespace MainSettings\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class MainSetting extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['name','meta_title','meta_content','meta_keywords','address'];
    protected $fillable = ['logo','favicon','email','mobile','scripts'];

    protected $table = 'main_settings';
}
