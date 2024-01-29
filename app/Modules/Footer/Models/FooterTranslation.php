<?php

namespace Footer\Models;

use Illuminate\Database\Eloquent\Model;

class FooterTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['content','copy_rights'];
    protected $table = 'footer_translations';
}
