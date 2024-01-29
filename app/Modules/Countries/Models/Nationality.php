<?php

namespace Countries\Models;

use Cities\Models\City;
use Areas\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Properties\Models\Property;


class Nationality extends Model
{
    protected $guards = [];

    protected $table = 'nationalities';
}
