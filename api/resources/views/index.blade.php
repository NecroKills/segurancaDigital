@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
<div class="container">
  <h3 class="center">Pesquisar Sistemas</h3>
    <!--Verifica se está recebendo registro, se não não estiver ira mostrar na interface  -->
    @if(isset($registro) && count($registro)== 0)
    <div class="card-panel red lighten-4 red-text text-darken-4">
        <p>Nenhum Sistema foi encontrado. Favor revisar os critérios da sua pesquisa!</p>
    </div>
    @endif
    <!--Verifica se existem erros, se exister mais de um erro então ira mostrar na interface  -->
    @if(isset($errors) && count($errors) >0)
    <div class="card-panel red lighten-4 red-text text-darken-4">
      @foreach($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
    </div>
    @endif

  <div class="row">
    <form class="" action="{{route('sistema.buscar')}}" method="get">
      {{ csrf_field() }}
      <div class="input-field">
        <input type="text" maxlength="100" size="100" name="descricao" id="descricao">
        <label>Descrição</label>
      </div>
      <div class="input-field">
        <input type="text" maxlength="10" size="10" name="sigla" id="sigla">
        <label>Sigla</label>
      </div>
      <div class="input-field">
        <input type="text" maxlength="100" size="100" name="email" id="email">
        <label>E-mail de atendimento do sistema</label>
      </div>
      </div>
      <!--Verifica se está recebendo registro,se e existir sera mostrado na interface  -->
      @if(isset($registro) == true && count($registro) > 0)
      <div class="row"id="tabela">
        <div class="table-responsive">
          <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Descrição</th>
                <th>Sigla</th>
                <th>E-mail de atendimento</th>
                <th>URL</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($registro as $registros)
              <tr>
                <td>{{$registros->descricao}}</td>
                <td>{{$registros->sigla}}</td>
                <td>{{$registros->email}}</td>
                <td>{{$registros->url}}</td>
                <td>{{$registros->status}}</td>
                <td>
                  <a class="btn blue material-icons" href="{{route('sistema.editar',$registros->id)}}" style="height: 28px;padding-left: 10px;padding-right: 10px;">mode_edit</a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </tbody>
          </table>
        </div>
      </div>
      @endif
    <div class="row">
      <div class="col s4">
        <button class="btn waves-effect waves-light" id="pesquisar" type="submit" >Pesquisar
          <i class="material-icons right">search</i>
        </button>
      </div>
      <div class="col s4">
        <button class="btn waves-effect waves-light red" type="reset" id="limpar" >Limpar
          <i class="material-icons right">clear_all</i>
        </button>
      </div>
  </form>
      <div class="col s4">
        <a class="btn waves-effect waves-light blue" href="{{route('sistema.adicionar')}}">Adicionar<i class="material-icons right">input</i></a>
      </div>
    </div>
</div>
@endsection
