<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'fromId',
        'toId',
        'deleteOnAction',
        'data',
        'url',
        'read',
        'type',
        'accept',
        'cancel'
    ];
}
