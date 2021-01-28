<?php


namespace App\Http\Controllers\Product;


use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
        return
            [
                'modelo' => 'required',
            ];
    }
    public function messages()
    {
        return
            [
                'modelo.required' => 'O campo :attribute é requerido.',

            ];
    }
}
