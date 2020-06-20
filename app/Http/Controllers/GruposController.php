<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Http\Requests\GrupoRequest;

class GruposController extends Controller
{
    public function index(){
        $grupos = Grupo::join('users', 'users.id', '=', 'grupos.idUser')->where('grupos.idUser', auth()->user()->id)
        ->select('grupos.id as id', 'grupos.nome as nome', 'grupos.descricao as descricao')->orderBy('nome')->paginate(8);

        return view('grupos.index', ['grupos'=>$grupos]);
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
        Grupo::find($id)->delete();
        return redirect()->route('grupos');
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
