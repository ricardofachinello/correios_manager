@extends('layouts.default')

@section('content')
  <h1>Encomendas</h1>
  <table class="table table-stripe table-bordered table-hover">
    <thead>
      <th>Título</th>
      <th>Código de Rastreio</th>
      <th>Grupo</th>
      <th>Data de Inclusão</th>
      <th>Ações</th>
    </thead>
    <tbody>
      @foreach($encomendas as $encomenda)	
        <tr>
		      <td>{{ $encomenda->nomeEncomenda }}</td>
          <td>{{ $encomenda->codigoRastreio }}</td>
          <td>
          {{\App\Grupo::where('id', '=', $encomenda->grupoid)->where('idUser', '=', auth()->user()->id)->pluck('nome')->first()}}
          </td>
          <td>{{ Carbon\Carbon::parse($encomenda->dataInclusao)->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('encomendas.edit', ['id'=>$encomenda->id]) }}" class="btn-sm btn-success">Editar</a>
            <a href="#" onClick="return ConfirmaExclusao({{$encomenda->id}})" class="btn-sm btn-danger">Remover</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$encomendas->links()}}
  <a href="{{ route('encomendas.create', []) }}" class="btn-sm btn-info">Adicionar</a>  
@stop

@section('table-delete')
"encomendas"
@endsection