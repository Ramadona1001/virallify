<?php

namespace AboutSections\Models;

use Illuminate\Database\Eloquent\Model;


class AboutSectionGallery extends Model
{
    protected $fillable = ['about_section_id','image'];

    protected $table = 'about_section_gallery';

}
