<?php

namespace AboutSections\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSectionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable =  ['name','sub_title','content','btn_text','btn_url'];
    protected $table = 'about_section_translations';
}
