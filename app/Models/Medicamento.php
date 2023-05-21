<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicamento extends Model
{
    
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'clasificacion', 'potencia', 'precio', 'propiedades', 'laboratorio', 'user_id'];

    public function getNombreAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function getPropiedadesAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function setClasificacionAttribute($value)
    {
        $this->attributes['clasificacion'] = mb_strtoupper($value, 'UTF-8');
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function responsables()
    {
        return $this->belongsToMany(Responsable::class);
    }

   // public $timestamps = false;
}
