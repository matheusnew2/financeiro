<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaModel extends Model
{
    protected $table = 'conta';
    protected $primaryKey = 'id_conta';
    public $timestamps = true;
}
