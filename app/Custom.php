<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
     protected $fillable = ['tamanho','pb','pc','capa','editoracao','ordem'];
}
