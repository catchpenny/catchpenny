<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domain';

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'official',
        'privacy',
        'invite_code',
        'generalId'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'domain_subscriptions', 'domainId', 'userId');
    }
}
