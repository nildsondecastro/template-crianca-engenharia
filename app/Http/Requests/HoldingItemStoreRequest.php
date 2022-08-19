<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoldingItemStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required',
            'order' => 'required',
            'id_holdings' => 'required',
        ];
    }
}
