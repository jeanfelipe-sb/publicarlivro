<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model {

    protected $fillable = ['prazo','pb','pc', 'sigla','nome','paginas', 'tamanho', 'exemplares', 'qtd_parcelas', 'valor_parcelas','pg_coloridas','preco_total','sigla'];

}
