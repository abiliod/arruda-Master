<?php

namespace App\Models\Pessoas;

use Illuminate\Database\Eloquent\Model;
/**
 * inclusão da função produtos para relacionamento com fabricante
 */
class Pessoa extends Model {
    protected $fillable= [
        'cpf_cnpj',
        'tipoPessoa',
        'lastName_Fantasia',
        'identidade_inscricaoEstadual',
        'data_nasc_Fundacao',
        'priName_Razao',
        'email',
        'sexo',
        'imagem',
        'status',
        'imagemCPF_CNPJ'
    ];

      /* 06/03/2020  Estabelecer relacionamento com usuarios pelo campo E-mail */
   public function users(){
    	return $this->hasMany('App\User','email');
    }
    public function enderecos() {
        return $this->hasMany('App\Models\Cidades\Endereco','pessoa_id');
    }

}
