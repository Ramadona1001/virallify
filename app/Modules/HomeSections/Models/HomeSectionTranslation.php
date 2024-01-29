<?php

namespace HomeSections\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSectionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable =  ['name','content','sub_title','btn_text','btn_url'];
    protected $table = 'home_section_translations';
}
