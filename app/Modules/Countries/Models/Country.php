<?php

namespace Countries\Models;

use App\Models\User;
use Cities\Models\City;
use Areas\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Properties\Models\Property;


class Country extends Model
{
    protected $fillable = ['name_ar', 'name_en' , 'code','status','file' , 'Currency_code' ,'exchange_rate'];

    protected $table = 'countries';


    //relationships

    public function cities(){
        return $this->hasMany(City::class);
    }


    public function areas(){
        return $this->hasMany(Area::class);
    }


    public function properties(){
        return $this->hasMany(Property::class , 'country_id');
    }



}
