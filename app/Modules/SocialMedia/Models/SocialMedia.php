<?php

namespace SocialMedia\Models;

use Illuminate\Database\Eloquent\Model;


class SocialMedia extends Model
{
    protected $fillable = ['status','sort','created_by' ,'social_icon' ,'social_link'];
    protected $table = 'social_media';
}
