<?php

namespace Plans\Models;

use Illuminate\Database\Eloquent\Model;

class PlanTranslation extends Model
{
    public $timestamps = false;
    protected $fillable =  ['name','content'];
    protected $table = 'plan_translations';
}
