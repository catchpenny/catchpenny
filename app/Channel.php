<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channel';

    protected $fillable = [
        'domainId',
        'name',
        'description',
        'created_by',
        'official',
        'status',
        'invite_code'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'channel_subscriptions', 'channelId', 'userId');
    }
}
