<?php

namespace App\Http\Requests;

use App\Match;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMatchRequest extends FormRequest
{
    /*public function authorize()
    {
        return \Gate::allows('product_edit');
    }*/

    public function rules()
    {
        return [
            'match_title'     => [
                'required'
            ],
            'firstteam_id'     => [
                'required'
            ],
            'secondteam_id'     => [
                'required'
            ],
        ];
    }
}
