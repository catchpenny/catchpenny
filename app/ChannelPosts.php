<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelPosts extends Model
{
    protected $table = 'channel_posts';

    protected $fillable = [
        'domainID',
        'channelID',
        'body',
        'created_by',
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'id', 'created_by');
    }
}
