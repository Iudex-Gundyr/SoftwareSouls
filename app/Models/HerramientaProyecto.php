<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HerramientaProyecto extends Model
{
    protected $table = 'herramientas_publicacion';
    protected $primaryKey = 'ID_Herr_Pub';
    public $timestamps = false;

    // Asegúrate de incluir el campo ID_Herramientas en el array fillable
    protected $fillable = ['ID_Herramientas', 'ID_Publicacion'];

    // Relación muchos a uno con la tabla herramientas
    public function Herramientas()
    {
        return $this->belongsTo(Herramientas::class, 'ID_Herramientas', 'ID_Herramientas');
    }

    // Relación muchos a uno con la tabla publicacion
    public function Proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'ID_Proyecto', 'ID_Proyecto');
    }
}
