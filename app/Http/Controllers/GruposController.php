<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Encomenda;
use App\Http\Requests\GrupoRequest;

use Illuminate\Support\Facades\Http;

use App\Mail\MailNotifica;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class GruposController extends Controller
{
    public function index(Request $filtro){
        
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == NULL){
            $grupos = Grupo::join('users', 'users.id', '=', 'grupos.idUser')->where('grupos.idUser', auth()->user()->id)
                ->select('grupos.id as id', 'grupos.nome as nome', 'grupos.descricao as descricao')->orderBy('nome')->paginate(8);
        }else{
            $grupos = Grupo::join('users', 'users.id', '=', 'grupos.idUser')->where('grupos.idUser', auth()->user()->id)
                ->select('grupos.id as id', 'grupos.nome as nome', 'grupos.descricao as descricao')->orderBy('nome')
                ->where('nome', 'like', '%'.$filtragem.'%')->orWhere('descricao', 'like', '%'.$filtragem.'%')->paginate(8); /* ->pagination(10); */   
        }
        return view('grupos.index', ['grupos'=>$grupos]);
    }

    public function detail($id){
        
        $encomendas =  Encomenda::where('Encomenda.idusers', auth()->user()->id)->where('Encomenda.grupoid', '=', $id)
            ->select('Encomenda.id as id', 'Encomenda.nomeEncomenda as nomeEncomenda', 'Encomenda.codigoRastreio as codigoRastreio', 'Encomenda.dataInclusao as dataInclusao', 'Encomenda.emailContato as emailContato', 'Encomenda.grupoid as grupoid', 'Encomenda.eventos as eventos')
            ->paginate(8); /* ->pagination(10); */

    return view('grupos.detail', ['encomendas'=>$encomendas]);
}

    public function create(){
        return view('grupos.create');
    }

    public function store(GrupoRequest $request){
        $novoGrupo = $request->all();
        Grupo::create($novoGrupo);

        return redirect()->route('grupos');
    }

    public function destroy($id){
        try{
            Grupo::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch(\Illuminate\Database\QueryException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        catch(\PDOException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit($id){
        $grupo = Grupo::find($id);
        return view('grupos.edit', compact('grupo'));
    }

    public function update(GrupoRequest $request, $id){
        Grupo::find($id)->update($request->all());
        return redirect()->route('grupos');
    }
}
