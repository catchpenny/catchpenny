<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainInvitations extends Model
{
    protected $table = 'domain_invitations';

    protected $fillable = [
        'userId',
        'domainId',
        'inviteCode'
    ];
}
