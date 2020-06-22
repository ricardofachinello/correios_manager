@extends('layouts.default')

@section('content')
  {!! Form::open(['name'=>'form_name', 'route'=>'grupos']) !!}
      <div class="sidebar-form" style="width:100%">
          <div class="input-group" style="width:80%; margin:auto">
              <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisar...">
              <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
              </span>
          </div>
      </div>
  {!! Form::close() !!}
  <h1>Grupos</h1>
  <table class="table table-stripe table-bordered table-hover">
    <thead>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Ações</th>
    </thead>
    <tbody>
      @foreach($grupos as $grupo)	
        <tr>
		      <td>{{ $grupo->nome }}</td>
          <td>{{ $grupo->descricao }}</td>
          <td>
            <a href="{{ route('grupos.edit', ['id'=>$grupo->id]) }}" class="btn-sm btn-success">Editar</a>
            <a href="#" onClick="return ConfirmaExclusao({{$grupo->id}})" class="btn-sm btn-danger">Remover</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$grupos->links()}}
  <a href="{{ route('grupos.create', []) }}" class="btn-sm btn-info">Adicionar</a>  
@stop

@section('table-delete')
"grupos"
@endsection