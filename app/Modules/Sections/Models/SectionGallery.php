<?php

namespace Sections\Models;

use Illuminate\Database\Eloquent\Model;


class SectionGallery extends Model
{
    protected $fillable = ['section_id','image'];

    protected $table = 'section_gallery';

}
