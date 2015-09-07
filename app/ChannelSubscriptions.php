<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelSubscriptions extends Model
{
    protected $table = 'channel_subscriptions';

    protected $fillable = [
        'userId',
        'channelId',
        'lastRead'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
