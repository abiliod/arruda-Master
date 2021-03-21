<?php


namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class StoreVariacoes extends FormRequest
{
    public function authorize()
    {
        if(auth()->user())
        {
            return true;
        }
        else
        {
         //   dd('pare qaui StoreVariações linha 19');
            return $this->getRedirectUrl( route('login'));
        }

    }
    public function rules()
    {
        return
            [
                'tamanho_br' => 'required',
                'cor' => 'required',
                'preco' => 'required',
                'estoque'=> 'required',
                'desconto'=> 'required',
            ];
    }
    public function messages()
    {
        return
            [
                'tamanho_br.required' => 'O campo :Tamanho é requerido.',
                'cor.required' => 'O campo :Cores é requerido.',
                'preco.required' => 'O campo :Preço é requerido.',
                'estoque.required'=> 'O campo :Estoque não foi informado.',
                'desconto.required'=> 'O campo :Desconto não foi informado.',
               // 'preco.min' => 'O Valor no Campo :Preço está menor do que R$ 10,00.',
            ];
    }
}
