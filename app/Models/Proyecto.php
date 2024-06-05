<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'publicacion';
    protected $primaryKey = 'ID_Publicacion';
    protected $fillable = ['NombreP', 'DescripcionP', 'Enlace_P','Portada'];

    public function fotosproyecto()
    {
        return $this->hasMany(FotosProyecto::class, 'ID_Publicacion');
    }
    public function herramientaPublicaciones()
    {
        return $this->hasMany(HerramientaProyecto::class, 'ID_Publicacion', 'ID_Publicacion');
    }
}
