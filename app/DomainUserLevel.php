<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainUserLevel extends Model
{
    protected $table = 'domain_user_level';

    protected $fillable = [
        'userId',
        'domainId',
        'level'
    ];

}
