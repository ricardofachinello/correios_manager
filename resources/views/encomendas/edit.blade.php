@extends('adminlte::page')

@section('content')
  <h3>Editar Encomenda: {{ $encomenda->nomeEncomenda }}</h3>

  @if($errors->any())
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  {!! Form::open(['route'=>["encomendas.update", 'id'=>$encomenda->id], 'method'=>'put']) !!}
    <div class="form-group">
        {!! Form::label('nomeEncomenda', 'Título: ') !!}
        {!! Form::text('nomeEncomenda', $encomenda->nomeEncomenda, ['class'=>'form-control', 'required']) !!}

        {!! Form::label('codigoRastreio', 'Código de Rastreio: ') !!}
        {!! Form::text('codigoRastreio', $encomenda->codigoRastreio, ['class'=>'form-control', 'required']) !!}
        
        {!! Form::label('emailContato', 'E-mail de contato: ') !!}
        {!! Form::text('emailContato', $encomenda->emailContato, ['class'=>'form-control', 'required']) !!}
    
        {!! Form::label('grupoid', 'Grupo: ') !!}
        {!! Form::select('grupoid',
                          \App\Grupo::where('idUser', '=', auth()->user()->id)->pluck('nome','id')->toArray(),
                          \App\Grupo::where('idUser', '=', auth()->user()->id)->where('nome', '=', 'Padrão')->pluck('nome','id')->toArray(), ['class'=>'form-control', 'required']) !!}
    </div>

    <div hidden class="form-group">
        {!! Form::label('idusers', 'idusers') !!}
        {!! Form::text('idusers', auth()->user()->id, ['class'=>'form-control', 'required', 'readonly']) !!}

        {!! Form::label('dataInclusao', 'dataInclusao') !!}
        {!! Form::text('dataInclusao', $encomenda->dataInclusao, ['class'=>'form-control', 'required', 'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
  {!! Form::close() !!}  
@stop