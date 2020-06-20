@extends('adminlte::page')

@section('content')
  <h3>Adicionar Novo Grupo</h3>

  @if($errors->any())
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  {!! Form::open(['route'=>'grupos.store']) !!}
    <div class="form-group">
    {!! Form::label('nome', 'Título: ') !!}
        {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}

        {!! Form::label('descricao', 'Descrição: ') !!}
        {!! Form::text('descricao', null, ['class'=>'form-control']) !!}
    </div>

    <div hidden class="form-group">
        {!! Form::label('idUser', 'idUser') !!}
        {!! Form::text('idUser', auth()->user()->id, ['class'=>'form-control', 'required', 'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
  {!! Form::close() !!}  
@stop