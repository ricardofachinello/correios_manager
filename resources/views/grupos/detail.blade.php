@extends('layouts.defaultdetail')

@section('content')
  <h1>Detalhes do Grupo {{ \App\Grupo::where('id', '=', $grupoid)->where('idUser', '=', auth()->user()->id)->pluck('nome')->first() }}</h1>
  <table class="table table-stripe table-bordered table-hover">
    <thead>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Ações</th>
    </thead>
    <tbody>
        <tr>
		    <td>{{ \App\Grupo::where('id', '=', $grupoid)->where('idUser', '=', auth()->user()->id)->pluck('nome')->first() }}</td>
          <td>{{ \App\Grupo::where('id', '=', $grupoid)->where('idUser', '=', auth()->user()->id)->pluck('descricao')->first() }}</td>
        <td>
          <a href="{{ route('grupos.edit', ['id'=>\App\Grupo::where('id', '=', $grupoid)->where('idUser', '=', auth()->user()->id)->pluck('id')->first()]) }}" class="btn-sm btn-success">Editar</a>
          <a href="#" onClick="return ConfirmaExclusao({{\App\Grupo::where('id', '=', $grupoid)->where('idUser', '=', auth()->user()->id)->pluck('id')->first()}})" class="btn-sm btn-danger">Remover</a>
        </td>
        </tr>
    </tbody>
  </table>
  <h1>Encomendas do Grupo  {{ \App\Grupo::where('id', '=', $grupoid)->where('idUser', '=', auth()->user()->id)->pluck('nome')->first() }}</h1>
  <table class="table table-stripe table-bordered table-hover">
    <thead>
      <th>Título</th>
      <th>Código de Rastreio</th>
      <th>Status</th>
      <th>Data de Inclusão</th>
      <th>Ações</th>
    </thead>
    @if($encomendas[0])
    <tbody>
      @foreach($encomendas as $encomenda)
        <tr>
		      <td>{{ $encomenda->nomeEncomenda }}</td>
          <td>{{ $encomenda->codigoRastreio }}</td>
          @if($encomenda->eventos)
            @if(json_decode($encomenda->eventos)->eventos)
              <td>{{ json_decode($encomenda->eventos)->eventos[0]->status }}</td>
            @else
              <td>Objeto não postado</td>
            @endif
          @else
            <td>Objeto não postado</td>
          @endif
          <td>{{ Carbon\Carbon::parse($encomenda->dataInclusao)->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('encomendas.detail', ['id'=>$encomenda->id]) }}" class="btn-sm btn-info">Detalhes</a>
            <a href="{{ route('encomendas.edit', ['id'=>$encomenda->id]) }}" class="btn-sm btn-success">Editar</a>
            <a href="#" onClick="return ConfirmaExclusao({{$encomenda->id}})" class="btn-sm btn-danger">Remover</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <tr>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td></td>
  <tr>
  @endif
  {{$encomendas->links()}}

@stop

@section('table-delete')
"encomendas"
@endsection