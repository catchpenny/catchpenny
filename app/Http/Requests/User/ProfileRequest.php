<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class ProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'aboutMe'        => 'max:255',
            'contactNumber' =>  'numeric',
            'relationshipSatus' => 'max:255',
            'city' => 'max:255',
            'country'     => 'max:255'
        ];
    }
}
