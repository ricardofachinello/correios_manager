<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encomenda;
use Auth;
use App\Http\Requests\EncomendaRequest;

class EncomendasController extends Controller
{
    public function index(){
        if(Auth::guest()){
            return view('encomendas.noUser');
        }
        $encomendas = Encomenda::join('users', 'users.id', '=', 'Encomenda.idusers') 
        ->where('Encomenda.idusers', auth()->user()->id)
        ->select('Encomenda.id as id', 'Encomenda.nomeEncomenda as nomeEncomenda', 'Encomenda.codigoRastreio as codigoRastreio', 'Encomenda.dataInclusao as dataInclusao', 'Encomenda.emailContato as emailContato')->orderBy('Encomenda.dataInclusao', 'desc')->paginate(8); /* ->pagination(10); */
        return view('encomendas.index', ['encomendas'=>$encomendas]);
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
        Encomenda::find($id)->delete();
        return redirect()->route('encomendas');
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

