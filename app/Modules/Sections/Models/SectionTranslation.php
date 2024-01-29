<?php

namespace Sections\Models;

use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable =  ['name','sub_title','content','btn_text','btn_url'];
    protected $table = 'section_translations';
}
