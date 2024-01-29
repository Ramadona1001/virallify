<?php

namespace Pages\Models;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;



class PageTranslation extends Model
{



    public $timestamps = false;
    protected $fillable = ['title','content'];
    protected $table = 'page_translations';



}
