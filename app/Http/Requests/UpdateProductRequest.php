<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
          'name' => ['required', 'max:100'],
          'price' => ['required', 'numeric', 'min:1'],
          'stock' => ['required', 'numeric', 'min:0'],
        ];
    }
}
