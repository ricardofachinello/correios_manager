@extends('adminlte::page')

@section('content')
    @foreach($usuarios as $usuarios)	
		<li>{{ $usuarios->loginusers }}</li>
		<li>{{ $usuarios->email }}</li>
    @endforeach
@stop
