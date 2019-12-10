<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoModel extends Model
{
    protected $primaryKey = "id_tipo";
    protected $table = "tipo";
    public $timestamps = false;
}
