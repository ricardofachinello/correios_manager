<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    protected $table = "Encomenda";
    protected $fillable = ['idusers', 'grupoid', 'codigoRastreio', 'nomeEncomenda', 'dataInclusao', 'emailContato', 'eventos'];
}
