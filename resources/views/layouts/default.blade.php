@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        function ConfirmaExclusao(id) {
            swal.fire({
                title: 'Você tem Certeza?', text: "Esta ação não poderá ser revertida",
                type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33', confirmButtonText: 'Delete',
                cancelButtonText: 'Nope', closeOnConfirm: false,
            }).then(function(isConfirm){
                if (isConfirm.value){
                    $.get('/'+ @yield('table-delete') +'/'+id+'/destroy', function(data){
                        
                        if(data.status == 200){
                            swal.fire(
                                'Encomenda Removida',
                                'Exclusão Confirmada',
                                'success'
                            ).then(function(){
                                location.reload();
                            });
                        }
                        else{
                            swal.fire(
                                'Erro',
                                'Não foi possível remover o Grupo',
                                'error'
                            ).then(function(){
                                location.reload();
                            });
                        }
                    });
                }
            });
        }
    </script>


@stop