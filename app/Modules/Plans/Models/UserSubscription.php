<?php

namespace Plans\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    protected $guards = [];
    protected $table = 'user_subscriptions';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
