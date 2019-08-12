<?php

namespace App\Http\Requests;

use App\Match;
use Illuminate\Foundation\Http\FormRequest;

class StoreMatchRequest extends FormRequest
{
    /*public function authorize()
    {
        return \Gate::allows('product_create');
    }*/

    public function rules()
    {
        return [
            'match_title'     => [
                'required',
                'unique:matches'
            ],
            'firstteam_id'     => [
                'required',
            ],
            'secondteam_id'    => [
                'required',
            ],
        ];
    }
}
