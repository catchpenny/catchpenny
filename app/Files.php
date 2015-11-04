<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'path',
        'name',
        'description',
        'type',
        'creatorId',
        'domainId',
        'channelId',
        'ownerId',
    ];
}
