<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sistema extends Model
{
  /**
   * [protected description]
   * proteção
   * Só podem ser editados os seguintes campos no banco de dados "atribuição em massa"
   */
  protected $fillable = [
    'id','descricao', 'sigla', 'email', 'url'
  ];

  /**
   * [findAll description]
   * Função verifica se existem valores nos campos de entrada,
   * se existir faz a busca no banco e retorna os valores encontrados.
   * @param  [type] $req [description]
   * @return [type]      [description]
   */
  public function findAll($req)
  {
    $descricao = $req['descricao'];
    $sigla = $req['sigla'];
    $email = $req['email'];

    if($req->has('descricao')){
      $registro = DB::select(DB::raw("SELECT controles.id, controles.status, controles.sistemas_id, sistemas.id, sistemas.descricao, sistemas.sigla, sistemas.email, sistemas.url
                                      FROM controles
                                      INNER JOIN sistemas ON controles.sistemas_id = sistemas.id
                                      WHERE sistemas.descricao = '$descricao'
                                      AND controles.id = (SELECT MAX(aux.id) FROM controles aux
                                      WHERE aux.sistemas_id = sistemas.id)"));
    }

    if($req->has('sigla')){
      $registro = DB::select(DB::raw("SELECT controles.id, controles.status, controles.sistemas_id, sistemas.id, sistemas.descricao, sistemas.sigla, sistemas.email, sistemas.url
                                      FROM controles
                                      INNER JOIN sistemas ON controles.sistemas_id = sistemas.id
                                      WHERE sistemas.sigla = '$sigla'
                                      AND controles.id = (SELECT MAX(aux.id) FROM controles aux
                                      WHERE aux.sistemas_id = sistemas.id)"));
    }

    if($req->has('email')){
      $registro = DB::select(DB::raw("SELECT controles.id, controles.status, controles.sistemas_id, sistemas.id, sistemas.descricao, sistemas.sigla, sistemas.email, sistemas.url
                                      FROM controles
                                      INNER JOIN sistemas ON controles.sistemas_id = sistemas.id
                                      WHERE sistemas.email = '$email'
                                      AND controles.id = (SELECT MAX(aux.id) FROM controles aux
                                      WHERE aux.sistemas_id = sistemas.id)"));
    }
    return view('index',compact('registro'));
  }

  public function edit($id)
  {
    $registro = DB::table('sistemas')->
                    join('controles', 'sistemas.id', '=', 'controles.sistemas_id')->
                    select('sistemas.id', 'sistemas.descricao', 'sistemas.sigla', 'sistemas.email', 'sistemas.url',
                    'controles.status', 'controles.usuario', 'controles.justificativa', 'controles.updated_at')->
                    where('sistemas.id','=', $id)->latest('controles.id')->first();
    return view('sistema.editar', compact('registro'));
  }


}
