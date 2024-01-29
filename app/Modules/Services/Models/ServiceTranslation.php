<?php

namespace Services\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    public $timestamps = false;
    protected $fillable =  ['name','content'];
    protected $table = 'service_translations';
}
