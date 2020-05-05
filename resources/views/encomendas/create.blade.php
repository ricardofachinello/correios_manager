@extends('adminlte::page')

@section('content')
  <h3>Adicionar Nova Encomenda</h3>
  {!! Form::open(['url'=>'encomendas/store']) !!}
    <div class="form-group">
        {!! Form::label('nomeEncomenda', 'Título: ') !!}
        {!! Form::text('nomeEncomenda', null, ['class'=>'form-control', 'required']) !!}

        {!! Form::label('codigoRastreio', 'Código de Rastreio: ') !!}
        {!! Form::text('codigoRastreio', null, ['class'=>'form-control', 'required']) !!}
        
        {!! Form::label('emailContato', 'E-mail de contato: ') !!}
        {!! Form::text('emailContato', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div hidden class="form-group">
        {!! Form::label('idusers', 'idusers') !!}
        {!! Form::text('idusers', auth()->user()->id, ['class'=>'form-control', 'required', 'readonly']) !!}

        {!! Form::label('dataInclusao', 'dataInclusao') !!}
        {!! Form::text('dataInclusao', Carbon\Carbon::now()->format('d/m/Y'), ['class'=>'form-control', 'required', 'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        {!! Form::submit('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
  {!! Form::close() !!}  
@stop