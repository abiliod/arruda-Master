<?php


namespace App\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return
            [
                'modelo' => 'required',
                'genero' => 'required',
                'descricao' => 'required|string|min:5|max:190',
                'cor' => 'required',
                'referencia' => 'required',
                'composicao' => 'required'
            ];
    }
    public function messages()
    {
        return
            [
                'modelo.required' => 'O campo :attribute é requerido.',
                'genero.required' => 'O campo :attribute é requerido.',
                'descricao.required' => 'O campo :attribute é requerido.',
                'descricao.string.min' => 'O campo :attribute deve ter no mínimo 5 caracteres.',
                'descricao.string.max' => 'O campo :attribute deve ter no máximo 190 caracteres.',
                'cor.required' => 'O campo :attribute é requerido.',
                'referencia.required' => 'O campo :attribute é requerido.',
                'composicao.required' => 'O campo :attribute é requerido.'
            ];
    }
}
