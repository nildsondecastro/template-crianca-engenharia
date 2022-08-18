<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StyleStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_templates' => 'required',
            'order' => 'required',
            //'path' => 'nullable',
            //'link_tutorial' => 'nullable',
        ];
    }
}
