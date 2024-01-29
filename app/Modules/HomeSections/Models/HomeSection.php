<?php

namespace HomeSections\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class HomeSection extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['name','content','btn_text','btn_url'];
    protected $fillable = ['status','created_by'];

    public function gallery()
    {
        return $this->hasMany(HomeSectionGallery::class, 'home_section_id');
    }

    protected $table = 'home_sections';

}
