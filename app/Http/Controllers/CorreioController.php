<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CorreioController extends Controller
{
    public function index(){
        $usuarios = User::All();
        return view('usuarios', ['usuarios'=>$usuarios]);
    }
}
