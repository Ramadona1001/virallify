<?php

namespace Orders\Models;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use CarTypes\Models\CarType;
use Plans\Models\UserPlan;
use Services\Models\Service;

class Order extends Model
{
    protected $guarded = [];
    protected $table = 'orders';

    public function car_type()
    {
        return $this->belongsTo(CarType::class, 'car_type_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function user_plan()
    {
        return $this->belongsTo(UserPlan::class, 'user_plan_id');
    }
    
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    
    public function representative()
    {
        return $this->belongsTo(User::class, 'representative_id');
    }
    
    public function user_address()
    {
        return $this->belongsTo(UserAddress::class, 'user_address_id');
    }
}
