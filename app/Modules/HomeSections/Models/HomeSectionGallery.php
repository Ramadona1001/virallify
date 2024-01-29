<?php

namespace HomeSections\Models;

use Illuminate\Database\Eloquent\Model;


class HomeSectionGallery extends Model
{
    protected $fillable = ['home_section_id','image'];

    protected $table = 'home_section_gallery';

}
