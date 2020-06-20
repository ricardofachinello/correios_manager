@extends('adminlte::page')

@section('content')
  <h3>Editar Grupo: {{ $grupo->nome }}</h3>

  @if($errors->any())
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  {!! Form::open(['route'=>["grupos.update", 'id'=>$grupo->id], 'method'=>'put']) !!}
    <div class="form-group">
        {!! Form::label('nome', 'Título: ') !!}
        {!! Form::text('nome', $grupo->nome, ['class'=>'form-control', 'required']) !!}

        {!! Form::label('descricao', 'Descrição: ') !!}
        {!! Form::text('descricao', $grupo->descricao, ['class'=>'form-control']) !!}
    </div>

    <div hidden class="form-group">
        {!! Form::label('idUser', 'idUser') !!}
        {!! Form::text('idUser', auth()->user()->id, ['class'=>'form-control', 'required', 'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
  {!! Form::close() !!}  
@stop