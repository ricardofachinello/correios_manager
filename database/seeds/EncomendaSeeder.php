<?php

use Illuminate\Database\Seeder;
use App\Encomenda;

class EncomendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Encomenda::create([
            'nomeEncomenda'=>'Encomenda Exemplo',
            'dataInclusao'=>Carbon\Carbon::now(),
            'emailContato'=>'exemplo@mail.com',
            'codigoRastreio'=>'ab123456789cd',
            'idusers'=>1
        ]);
    }
}
