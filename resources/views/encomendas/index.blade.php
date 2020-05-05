@extends('adminlte::page')

@section('content')
  <h1>Encomendas</h1>
  <table class="table table-stripe table-bordered table-hover">
    <thead>
      <th>Título</th>
      <th>Código de Rastreio</th>
      <th>Data de Inclusão</th>
    </thead>
    <tbody>
      @foreach($encomendas as $encomenda)	
        <tr>
		      <td>{{ $encomenda->nomeEncomenda }}</td>
          <td>{{ $encomenda->codigoRastreio }}</td>
          <td>{{ $encomenda->dataInclusao }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>  
@stop
