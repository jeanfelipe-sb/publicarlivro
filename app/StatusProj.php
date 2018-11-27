<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProj extends Model {

    protected $fillable = ['ordem', 'nome','porcentagem'];

    public function projetos() {
        return $this->hasMany('App\Projeto');
    }

}
