<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encomenda;
use App\Grupo;
use Auth;
use App\Http\Requests\EncomendaRequest;
use Illuminate\Support\Facades\Http;

class EncomendasController extends Controller
{
    public function index(Request $filtro){
        
        if(Grupo::where('idUser', '=', auth()->user()->id)->first()==null){
            $grupo = new Grupo();
            $grupo->idUser=auth()->user()->id;
            $grupo->nome='Padrão';
            $grupo->descricao='Grupo padrão';
            $grupo->save();
        }
        
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == NULL){
            $encomendas = Encomenda::join('users', 'users.id', '=', 'Encomenda.idusers') 
                ->where('Encomenda.idusers', auth()->user()->id)
                ->select('Encomenda.id as id', 'Encomenda.nomeEncomenda as nomeEncomenda', 'Encomenda.codigoRastreio as codigoRastreio', 'Encomenda.dataInclusao as dataInclusao', 'Encomenda.emailContato as emailContato', 'Encomenda.grupoid as grupoid', 'Encomenda.eventos as eventos')->orderBy('Encomenda.dataInclusao', 'desc')->orderBy('Encomenda.nomeEncomenda', 'asc')->paginate(8); /* ->pagination(10); */
        }else{
            $encomendas = Encomenda::join('users', 'users.id', '=', 'Encomenda.idusers') 
                ->where('Encomenda.idusers', auth()->user()->id)
                ->select('Encomenda.id as id', 'Encomenda.nomeEncomenda as nomeEncomenda', 'Encomenda.codigoRastreio as codigoRastreio', 'Encomenda.dataInclusao as dataInclusao', 'Encomenda.emailContato as emailContato', 'Encomenda.grupoid as grupoid', 'Encomenda.eventos as eventos')->orderBy('Encomenda.dataInclusao', 'desc')->orderBy('Encomenda.nomeEncomenda', 'asc')
                ->where('nomeEncomenda', 'like', '%'.$filtragem.'%')->orWhere('codigoRastreio', 'like', '%'.$filtragem.'%')->paginate(8); /* ->pagination(10); */
            
        }

        return view('encomendas.index', ['encomendas'=>$encomendas]);
    }

    public function detail($id){
        
            $encomendas =  Encomenda::where('Encomenda.idusers', auth()->user()->id)->where('Encomenda.id', '=', $id)
                ->select('Encomenda.id as id', 'Encomenda.nomeEncomenda as nomeEncomenda', 'Encomenda.codigoRastreio as codigoRastreio', 'Encomenda.dataInclusao as dataInclusao', 'Encomenda.emailContato as emailContato', 'Encomenda.grupoid as grupoid', 'Encomenda.eventos as eventos')
                ->paginate(8); /* ->pagination(10); */

        return view('encomendas.detail', ['encomendas'=>$encomendas]);
    }

    public function create(){
        return view('encomendas.create');
    }

    public function store(EncomendaRequest $request){

        $novaEncomenda = $request->all();
        Encomenda::create($novaEncomenda);

        return redirect()->route('encomendas');
    }

    public function destroy($id){
        try{
            Encomenda::find($id)->delete();
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
        $encomenda = Encomenda::find($id);
        return view('encomendas.edit', compact('encomenda'));
    }

    public function update(EncomendaRequest $request, $id){
        Encomenda::find($id)->update($request->all());
        return redirect()->route('encomendas');
    }
}

