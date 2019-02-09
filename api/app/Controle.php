<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
  /**
   * [protected description]
   * proteção
   * Só podem ser editados os seguintes campos no banco de dados "atribuição em massa"
   */
  protected $fillable = [
    'id','status', 'usuario', 'justificativa', 'sistemas_id'
  ];

}
