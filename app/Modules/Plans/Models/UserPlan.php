<?php

namespace Plans\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    protected $fillable = ['plan_id','user_id','publish','paypal_plan_id'];
    protected $table = 'users_plans';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
