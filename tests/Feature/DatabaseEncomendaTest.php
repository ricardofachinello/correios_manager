<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

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
            'name' => 'Ricardo Fachinello',
        ]);

        $user = DB::table('users')->where('name', 'Ricardo Fachinello')->value('id');

        $data = ['idusers' => $user,
            'codigoRastreio' => 'zz123456789zz',
            'nomeEncomenda' => 'Teste',
            'dataInclusao' => '2020-01-01',
            'emailContato' => 'teste@outroteste.com'
        ];

        DB::table('Encomenda')->insert($data);

        $this->assertDatabaseHas('Encomenda', $data);

        DB::table('Encomenda')->where('codigoRastreio', 'zz123456789zz')->delete();  
    }
}