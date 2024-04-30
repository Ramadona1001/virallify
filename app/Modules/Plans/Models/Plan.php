<?php

namespace Plans\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Properties\Models\Property;


class Plan extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes  = ['name','content','items'];
    protected $fillable = ['status','created_by' , 'price','has_ai_assistant','upload_video','channels_count','posts_count'];

    protected $table = 'plans';

}
