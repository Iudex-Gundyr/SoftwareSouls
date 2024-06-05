<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosProyecto extends Model
{
    use HasFactory;

    protected $table = 'fotosproyecto';
    protected $primaryKey = 'ID_Fotoproyecto';
    protected $fillable = ['fotografia', 'ID_Publicacion'];

    // Indica que la columna fotografia no debe tratarse automáticamente como una columna de tiempo
    public $timestamps = false;

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'ID_Publicacion');
    }
}
