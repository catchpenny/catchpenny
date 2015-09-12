<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainNotifications extends Model
{
    protected $table = 'domain_notifications';

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
