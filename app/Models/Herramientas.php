<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herramientas extends Model
{    use HasFactory;
    protected $table = 'herramientas';
    protected $primaryKey = 'ID_Herramientas';
    public $timestamps = false; // Si no necesitas las columnas timestamps (created_at, updated_at)

    protected $fillable = [
        'NombreHerramienta',
        'DescripcionH',
        'Fotografia',
    ];

    public function herramientaPublicaciones()
    {
        return $this->hasMany(HerramientaProyecto::class, 'ID_Herramientas', 'ID_Herramientas');
    }

}
