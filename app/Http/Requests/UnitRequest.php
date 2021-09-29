<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
        $id = $this->unit->id ?? null;
        return [
            'code' => 'required| unique:categories,code,'.$id, 
            'name' => 'required| string| max:250',
            'symbol' => 'required| string| max:3', 
            'baseunit' => 'required| integer', 
            'opname' => 'sometimes| string| max:5',
            'opvalue' => 'sometimes| string| max:5',

        ];
    }
}
