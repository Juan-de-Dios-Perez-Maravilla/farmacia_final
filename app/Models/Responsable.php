<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    protected $table = 'responsables';
    public $timestamps = false;

    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class);
    }
}
