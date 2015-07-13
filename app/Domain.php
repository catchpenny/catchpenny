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
        'status',
        'invite_code'
    ];
}
