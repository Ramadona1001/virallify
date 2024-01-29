<?php

namespace Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\App;
use Cviebrock\EloquentSluggable\Sluggable;


class Page extends Model implements TranslatableContract
{

    use HasFactory;
    use Sluggable;

    use Translatable;
    public $translatedAttributes  = ['title','content'];
    protected $fillable = ['publish','image','created_by'];

    protected $table = 'pages';




    protected $guarded = [];


    public function sluggable(): array
    {

        App::setLocale('en');

        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
