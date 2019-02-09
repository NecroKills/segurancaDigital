<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\CollectionStdClass;
use App\Sistema;
use App\Controle;
use App\Http\Requests\SistemaBuscarRequest;
use App\Http\Requests\SistemaCadastrarRequest;
use App\Http\Requests\SistemaAtualizarRequest;

class SistemaController extends Controller
{

    /**
     * [function buscar description]
     * @param  SistemaBuscarRequest $req [string: descricao, sigla, email, id, token, status]
     * @return [array]       [array dos registros encontrados no banco]
     */
    public function buscar(SistemaBuscarRequest $req){
      $req->all();
      $sistema = new Sistema();
      return $sistema->findAll($req);
    }

    /**
     * [Carrega a interface de adicionar sistema.]
     * @return [interface adicionar]
     */
    public function adicionar()
    {
      return view('sistema.adicionar');
    }

    /**
     * [salva registros do sistema no banco]
     * @param  Request $req [string: descricao, sigla, email, url, token]
     * @return [redireciona para interface do sistema]
     */
    public function salvar(SistemaCadastrarRequest $req)
    {
      $dados = array_filter($req->all());
      $sistema = Sistema::create($dados);
      $id = $sistema['id'];
      $controle = Controle::create([
        'sistemas_id' => $id,
        'justificativa'=> 'Criação do sistema',
      ]);
      return redirect()->route('home');
    }

    /**
     * [Carrega a interface de editar sistema.]
     * @param  [int] $id [id do sistema selecionado]
     * @return [array]     [dados do sistema]
     */
    public function editar($id)
    {
      $sistema = new Sistema();
      return $sistema->edit($id);
    }

    /**
     * [atualizar atualiza dados do sistema no banco]
     * @param  Request $req [string: descricao, sigla, email, url, status, justificativa, token]
     * @param  [type]  $id  [int: id do sistema]
     * @return [type]       [redireciona para interface do sistema]
     */
    public function atualizar(SistemaAtualizarRequest $req, $id)
    {
      $idSistema = $id;
      $dados = $req->all();
      $status = $dados['status'];
      Sistema::find($idSistema)->update($dados);
      $justificativa = $dados['justificativa'];
      $controle = Controle::create([
            'sistemas_id' => $idSistema,
            'justificativa' => $justificativa,
            'status' => $status,
      ]);
      return redirect()->route('home');
    }

}
