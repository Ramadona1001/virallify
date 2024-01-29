<?php

namespace Partners\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable =  ['name'];
    protected $table = 'partner_translations';
}
