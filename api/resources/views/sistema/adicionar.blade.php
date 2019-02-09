@extends('layout.site')

@section('titulo','Cadastrar')

@section('conteudo')
  <div class="container">
    <h3 class="center">Adicionar Sistema</h3>
    @if(isset($errors) && count($errors) >0)
    <div class="card-panel red lighten-4 red-text text-darken-4">
      @foreach($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
    </div>
    @endif
    <div class="row">
      <form class="" action="{{route('sistema.salvar')}}" method="post">
        {{ csrf_field() }}
        <div class="input-field">
          <input maxlength="100" type="text" name="descricao" value="{{old('descricao')}}">
          <label>Descrição</label>
        </div>
        <div class="input-field">
          <input maxlength="10" type="text" name="sigla" value="{{old('sigla')}}">
          <label>Sigla</label>
        </div>
        <div class="input-field">
          <input maxlength="100" type="text" name="email" value="{{old('email')}}">
          <label>E-mail de atendimento do sistema</label>
        </div>
        <div class="input-field">
          <input maxlength="50" type="text" name="url" value="{{old('url')}}">
          <label>URL</label>
        </div>
        <div class="row">
            <div class="col s10">
              <a class="btn deep-blue" href="{{route('home')}}">Voltar</a>
            </div>
            <div class="col s2">
              <button class="btn deep-orange">Salvar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
