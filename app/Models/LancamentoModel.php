<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LancamentoModel extends Model
{
    protected $primaryKey = "id_lancamento";
    protected $table = "lancamento";
    public $timestamps = false;
}
