<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Encomenda;

class DatabaseEncomendaTeste extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEncomenda()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'RICARDO MATHEUS FACHINELLO',
        ]);

        $user = DB::table('users')->where('name', 'RICARDO MATHEUS FACHINELLO')->value('id');
        $grupo = DB::table('grupos')->where('nome', 'Padrão')->where('idUser', $user)->value('id');

        $data = ['idusers' => $user,
            'codigoRastreio' => 'zz123456789zz',
            'nomeEncomenda' => 'Teste',
            'dataInclusao' => '2020-01-01',
            'emailContato' => 'teste@outroteste.com',
            'grupoid' => $grupo,
        ];

        Encomenda::create($data);

        /*sleep(10);
        */
        

        $this->assertDatabaseHas('Encomenda', $data);

        $remover = DB::table('Encomenda')->where('codigoRastreio', 'zz123456789zz')->value('id');  

        Encomenda::find($remover)->delete();

    }
}