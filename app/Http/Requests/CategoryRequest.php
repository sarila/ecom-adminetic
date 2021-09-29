<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->category->id ?? null; 
        return [
            'name' => 'required | string | max:250',
            'slug' => 'required | string | max:250',
            'image' => 'sometimes | file | image | max:3000', 
            'code' => 'required| unique:categories,code,'.$id, 
            'description' => 'sometimes | max:30000', 
            'parent_id' => 'sometimes | integer ',
            'priority' => 'sometimes | integer', 
            'status' => 'bool | sometimes',
        ];
    }
}
