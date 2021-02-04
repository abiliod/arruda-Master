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
                'composicao' => 'required',
                'modelo_id' => 'required',
                'colecao_id' => 'required',
                'sub_category' => 'required',
                'descricao' => 'required|string|min:5|max:190',
                'genero' => 'required',
                'referencia' => 'required|min:5|max:5',
                'tipo_un' => 'required',

            ];
    }
    public function messages()
    {
        return
            [
                'composicao.required' => 'O campo :Composição é requerido.',
                'modelo_id.required' => 'O campo :Modelo é requerido.',
                'colecao_id.required' => 'O campo :Coleção é requerido.',
                'sub_category.required' => 'O campo :Categoria é requerido.',
                'descricao.required' => 'O campo :Descrição é requerido.',
                'descricao.string.min' => 'No campo :Descrição deve ter no mínimo 5 caracteres.',
                'descricao.string.max' => 'No campo :Descrição deve ter no máximo 190 caracteres.',
                'genero.required' => 'O campo :Genero é requerido.',
                'referencia.required' => 'O campo :Referência é requerido.',
                'referencia.min' => 'A quantidade de caracteres indicada para o campo :Referência é 5 caracteres.',
                'referencia.max' => 'A quantidade de caracteres indicada para o campo :Referência é 5 caracteres.',
                //'referencia.unique' => 'O Valor indicado para o campo :Referência já está relacionado a outro produto.',
                'tipo_un.required' => 'O campo :Tipo de Unidade é requerido.'
            ];
    }
}
