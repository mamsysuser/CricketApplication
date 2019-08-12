<?php

namespace App\Http\Requests;

use App\Player;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class StorePlayerRequest extends FormRequest
{
    /*public function authorize()
    {
        return \Gate::allows('player_create');
    }*/

    public function rules()
    {
        return [
            'team_id'     => [
                'required'
            ],
            'firstName'     => [
                'required'
            ],
            'lastName'     => [
                'required'
            ],
            'imageUri'    => [
                'image'
            ],
            'jerseyNo'     => [
                'required',
                'numeric'
            ],
            'country_id' => [
                'required'
            ],
        ];
    }
}
