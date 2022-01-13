<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';

    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'ubicacion',
        'duracion',
        'estado',
        'latitud',
        'longitud',
        'comentario',
        'preparacion_id',
        'cliente_id',
        'servicio_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function servicio()
    {
        return $this->belongsTo('App\Models\servicio');
    }
}
