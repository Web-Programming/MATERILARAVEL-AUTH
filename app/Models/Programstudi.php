<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programstudi extends Model
{
    use HasFactory;

    protected $table = "programstudi";

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, "id_fakultas", "id");
    }
}
