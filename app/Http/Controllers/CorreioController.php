<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encomenda;

class CorreioController extends Controller
{
    public function index(){
        $encomendas = Encomenda::All();
        return view('encomendas', ['encomendas'=>$encomendas]);
    }
}
