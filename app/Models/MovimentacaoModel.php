<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentacaoModel extends Model
{
    protected $primaryKey = "id_movimentacao";
    protected $table = "movimentacao";
    public $timestamps = true;
}
