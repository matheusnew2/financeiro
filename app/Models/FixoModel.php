<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FixoModel extends Model
{
    protected $table = 'fixo';
    protected $primaryKey = 'id_fixo';
    public $timestamps = false;
}
