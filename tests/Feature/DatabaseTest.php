<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDatabase()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'Ricardo Fachinello',
        ]);

        DB::table('Encomenda')->insert(
            ['idusers' => 1,
            'codigoRastreio' => 'zz123456789zz',
            'nomeEncomenda' => 'Teste',
            'dataInclusao' => '2020-01-01',
            'emailContato' => 'teste@outroteste.com'
        ]);

        $this->assertDatabaseHas('Encomenda', [
            'idusers' => 1,
            'codigoRastreio' => 'zz123456789zz',
            'nomeEncomenda' => 'Teste',
            'dataInclusao' => '2020-01-01',
            'emailContato' => 'teste@outroteste.com'
        ]);


        DB::table('Encomenda')->where('codigoRastreio', 'zz123456789zz')->delete();
    }
}
