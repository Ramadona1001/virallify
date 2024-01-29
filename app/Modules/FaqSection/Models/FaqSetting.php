<?php

namespace FaqSection\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class FaqSetting extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['question','answer'];
    protected $fillable = ['publish','created_by'];

    protected $table = 'faq_settings';
}
