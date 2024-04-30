<?php

namespace SocialMediaChannel\Models;

use Illuminate\Database\Eloquent\Model;


class SocialMediaChannel extends Model
{
    protected $fillable = ['title','status','sort','created_by' ,'social_icon' ];
    protected $table = 'social_media_channels';
}
