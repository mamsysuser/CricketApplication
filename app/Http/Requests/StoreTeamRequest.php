<?php

namespace App\Http\Requests;

use App\Team;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class StoreTeamRequest extends FormRequest
{
    /*public function authorize()
    {
        return \Gate::allows('team_create');
    }*/

    public function rules()
    {
        return [
            'name'     => [
                'required',
                'unique:teams'
            ],
            'logoUri'    => [
                'required',
                'image'
            ],
            'club_state' => [
                'required',
            ],
        ];
    }
}
