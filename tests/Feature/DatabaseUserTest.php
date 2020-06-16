<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUser()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'Ricardo Fachinello',
        ]);

        $data = [
            'name' => 'Pessoa Pessoal',
            'email' => 'Prefixo@Infixo.Sufixo',
            'password' => 'EstaSenhaEhUmHash',
            'endereco' => 'Passo Fundo, RS, Brasil'
        ];

        DB::table('users')->insert($data);

        $this->assertDatabaseHas('users', $data);

        DB::table('users')->where('email', 'Prefixo@Infixo.Sufixo')->delete();
    
        
    }
}
