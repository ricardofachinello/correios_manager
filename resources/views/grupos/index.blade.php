@extends('layouts.default')

@section('content')
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
            {{--<a href="#" onClick="return ConfirmaExclusao({{$grupo->id}})" class="btn-sm btn-danger">Remover</a>--}}
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