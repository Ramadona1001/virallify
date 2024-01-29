<?php

namespace AboutSections\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class AboutSection extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['name','content','btn_text','btn_url'];
    protected $fillable = ['status','created_by'];

    public function gallery()
    {
        return $this->hasMany(AboutSectionGallery::class, 'about_section_id');
    }

    protected $table = 'about_sections';

}
