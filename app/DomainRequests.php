<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainRequests extends Model
{
    protected $table = 'domain_requests';


    protected $fillable = [
        'userId',
        'domainId',
        'requestCode'
    ];
}
