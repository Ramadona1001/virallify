<?php

namespace Sections\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Section extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['name','sub_title','content','btn_text','btn_url'];
    protected $fillable = ['status','created_by','type','order_no'];

    public function gallery()
    {
        return $this->hasMany(SectionGallery::class, 'section_id');
    }

    protected $table = 'sections';

}
