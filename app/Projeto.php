<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model {

    protected $fillable = ['statuspagseguro','titulo','original_file', 'autores','paginas', 'tamanho','exemplares', 'endereco_entrega','prazo',
        'observacao', 'valor','pb','pc','preco_sugerido','notas','pago','user_id','status_projs_id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function statusProj() {
        return $this->belongsTo('App\StatusProj', 'status_projs_id');
    }

}
