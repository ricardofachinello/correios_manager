<?php

namespace App\Console\Commands;
use App\Encomenda;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Status Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**
         * TO DO
         * Se a encomenda já está entregue, não atualizar o status
         */
        $encomendas = Encomenda::all();
        foreach($encomendas as $encomenda){
            sleep(5);
            $status = Http::get('https://api.linketrack.com/track/json?user=teste&token=1abcd00b2731640e886fb41a8a9671ad1434c599dbaa0a0de9a5aa619f29a83f&codigo='.$encomenda->codigoRastreio)
            ->json();
            if($status){
                $encomenda->eventos = $status;
                $encomenda->save();
            }
        }

    }
}
