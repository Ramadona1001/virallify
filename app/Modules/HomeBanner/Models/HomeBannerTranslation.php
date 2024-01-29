<?php

namespace HomeBanner\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBannerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['content','title','btn1_text','btn2_text','btn1_link','btn2_link'];
    protected $table = 'home_banner_translations';
}
