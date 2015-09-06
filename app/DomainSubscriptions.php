<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainSubscriptions extends Model
{
    protected $table = 'domain_subscriptions';

    protected $fillable = [
        'userId',
        'domainId',
        'level'
    ];
}
