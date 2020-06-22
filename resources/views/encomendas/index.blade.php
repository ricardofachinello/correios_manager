@extends('layouts.default')

@section('content')
  {!! Form::open(['name'=>'form_name', 'route'=>'encomendas']) !!}
      <div class="sidebar-form" style="width:100%">
          <div class="input-group" style="width:80%; margin:auto">
              <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisar...">
              <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
              </span>
          </div>
      </div>
  {!! Form::close() !!}
  <h1>Encomendas</h1>
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
  {{$encomendas->links()}}
  <a href="{{ route('encomendas.create', []) }}" class="btn-sm btn-info">Adicionar</a>  
@stop

@section('table-delete')
"encomendas"
@endsection