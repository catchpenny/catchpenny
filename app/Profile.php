<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'user_profile';

    protected $fillable = [
        'id',
        'aboutMe',
        'relationshipStatus',
        'photoBig',
        'photomedium',
        'photoSmall',
        'coverBig',
        'coverSmall',
        'city',
        'country',
        'contactEmail',
        'contactNumber'
    ];

}
