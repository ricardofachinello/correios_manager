<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
            ->type('name','Teste')
            ->type('email','teste@testemail.com')
            ->type('password', '12345678')
            ->type('password_confirmation', '12345678')
            ->type('endereco','Acre')
            ->press('Register')
            ->assertSee('Encomendas');
        });

        DB::table('users')->where('email', 'teste@testemail.com')->delete();
    }
}
