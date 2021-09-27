<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $id = $this->brand->id??null;
        return [
            'name' => 'required | string | max:100',
            'code' => 'required | unique:brands,code, ' . $id, 
            'image' => 'sometimes | file | image | max:3000',
        ];
    }
}
