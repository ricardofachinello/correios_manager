<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encomenda;
use Auth;

class EncomendasController extends Controller
{
    public function index(){
        if(Auth::guest()){
            return view('encomendas.noUser');
        }
        $encomendas = Encomenda::join('users', 'users.id', '=', 'Encomenda.idusers') 
        ->where('Encomenda.idusers', auth()->user()->id)
        ->select('Encomenda.nomeEncomenda as nomeEncomenda', 'Encomenda.codigoRastreio as codigoRastreio', 'Encomenda.dataInclusao as dataInclusao', 'Encomenda.emailContato as emailContato')->orderBy('Encomenda.dataInclusao', 'desc')->get(); /* ->pagination(10); */
        return view('encomendas.index', ['encomendas'=>$encomendas]);
    }

    public function create(){
        return view('encomendas.create');
    }

    public function store(Request $request){
        $novaEncomenda = $request->all();
        Encomenda::create($novaEncomenda);

        return redirect('encomendas');
    }
}
