<?php

namespace FaqSection\Models;

use Illuminate\Database\Eloquent\Model;

class FaqSettingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['question','answer'];
    protected $table = 'faq_setting_translations';
}
