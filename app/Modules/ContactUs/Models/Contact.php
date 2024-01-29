<?php

namespace ContactUs\Models;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    protected $fillable = ['name','email','subject','message'];

    protected $table = 'contacts';
}
