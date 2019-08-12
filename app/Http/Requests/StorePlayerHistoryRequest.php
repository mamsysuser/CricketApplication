<?php

namespace App\Http\Requests;

use App\PlayerHistory;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class StorePlayerHistoryRequest extends FormRequest
{
    /*public function authorize()
    {
        return \Gate::allows('player_create');
    }*/

    public function rules()
    {
        return [
            'matches'     => [
                'numeric'
            ],
            'runs'     => [
                'numeric'
            ],
            'highest_score'     => [
                'numeric'
            ],
            'hundreds'    => [
                'numeric'
            ],
            'fifties'     => [
                'numeric'
            ],
            'wickets' => [
                'required'
            ],
        ];
    }
}
