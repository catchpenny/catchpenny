<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'user_profile';

    protected $fillable = [
        'id',
        'aboutMe',
        'status',
        'photoBig',
        'photoSmall ',
        'city',
        'country',
        'contactEmail',
        'contactNumber'
    ];

}
