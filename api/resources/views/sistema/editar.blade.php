@extends('layout.site')

@section('titulo','Sistemas')

@section('conteudo')
  <div class="container">
    <h3 class="center">Editando Sistema</h3>
    @if(isset($errors) && count($errors) >0)
    <div class="card-panel red lighten-4 red-text text-darken-4">
      @foreach($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
    </div>
    @endif
    <div class="row">
      <form class="" action="{{route('sistema.atualizar', $registro->id)}}" method="post">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}
        <div class="input-field">
          <!-- verifica se existe a variavel descrição, então mostra no campo, caso não exista mostrar vazio -->
          <input maxlength="100" type="text" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
          <label>Descrição</label>
        </div>
        <div class="input-field">
          <input maxlength="10" type="text" name="sigla" value="{{isset($registro->sigla) ? $registro->sigla : ''}}">
          <label>Sigla</label>
        </div>
        <div class="input-field">
          <input maxlength="100" type="text" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
          <label>E-mail de atendimento do sistema</label>
        </div>
        <div class="input-field">
          <input maxlength="50" type="text" name="url" value="{{isset($registro->url) ? $registro->url : ''}}">
          <label>URL</label>
        </div>
        <div class="input-field">
          <select type ="text" name="status" value="{{isset($registro->status) ? $registro->status : ''}}">
            <option value="Ativo">Ativo</option>
            <option value="Cancelado">Cancelado</option>
          </select>
          <label>Status</label>
        </div>
        <div class="input-field">
          <input type="text" name="usuario" disabled value="{{isset($registro->usuario) ? $registro->usuario : ''}}">
          <label>Usuário responsavel pela última alteração</label>
        </div>
        <div class="input-field">
          <input type="text" name="updated_at" disabled value="{{isset($registro->updated_at) ? $registro->updated_at : ''}}">
          <label>Data da última alteração</label>
        </div>
        <div class="input-field">
          <input maxlength="500" type="text" name="justificativa" disabled value="{{isset($registro->justificativa) ? $registro->justificativa : ''}}">
          <label>Justificativa da última alteração</label>
        </div>
        <div class="input-field">
          <textarea maxlength="500" name="justificativa"></textarea>
          <label>Nova justificativa de alteração</label>
        </div>
        <div class="col s10">
          <a class="btn deep-blue" href="{{route('home')}}">Voltar</a>
        </div>
        <div class="row">
            <div class="col s2">
              <button class="btn deep-orange">Atualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
