@extends('adminlte::page')

@section('content')
  <h1>Usuarios</h1>
  <table class="table table-stripe table-bordered table-hover">
    <thead>
      <th>Login</th>
      <th>Senha</th>
    </thead>
    <tbody>
      @foreach($usuarios as $usuarios)	
        <tr>
          <td>{{ $usuarios->loginusers }}</td>
		      <td>{{ $usuarios->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>  
@stop

