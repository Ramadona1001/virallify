<?php

namespace MainSettings\Models;

use Illuminate\Database\Eloquent\Model;

class MainSettingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','meta_title','meta_content','meta_keywords','address','content'];
}
