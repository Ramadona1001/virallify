<?php

namespace Translates\Models;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'langauges';

    protected $fillable = ['name','code','direction'];
}
