@extends('layouts.defaultdetail')

@section('content')
  <h1>Encomenda {{ $encomendas[0]->nomeEncomenda }}</h1>
  <table class="table table-stripe table-bordered table-hover">
    <thead>
      <th>Título</th>
      <th>Código de Rastreio</th>
      <th>Status</th>
      <th>Grupo</th>
      <th>Data de Inclusão</th>
      <th>Ações</th>
    </thead>
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
  <h1>Detalhes da Encomenda  {{ $encomendas[0]->nomeEncomenda }}</h1>
  <table class="table table-stripe table-bordered table-hover">
    <thead>
      <th>Data</th>
      <th>Hora</th>
      <th>Local</th>
      <th>Status</th>
    </thead>
    <tbody>
        @if($encomenda->eventos)
            @if(json_decode($encomenda->eventos)->eventos)
                @foreach(json_decode($encomendas[0]->eventos)->eventos as $encomendaEvento)
                    <tr>
                        <td>{{ $encomendaEvento->data }}</td>
                        <td>{{ $encomendaEvento->hora }}</td>
                        <td>{{ $encomendaEvento->local }}</td>
                        <td>{{ $encomendaEvento->status }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>Objeto não postado</td>
                </tr>
            @endif
            @else
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>Objeto não postado</td>
                </tr>
            @endif
        
      </tbody>
  </table>
  {{$encomendas->links()}}

@stop

@section('table-delete')
"encomendas"
@endsection