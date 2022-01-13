<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanque extends Model
{
    use HasFactory;

    protected $table = 'tanques';

    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'largo',
        'ancho',
        'alto',
        'capacidad',
        'latitud',
        'observacion',
        'longitud',
        'imagen',
        'numero_uso',
        'estado_id',
        'almacen_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function almacen()
    {
        return $this->belongsTo('App\Models\Almacen',);
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }

    public function preparaciones()
    {
        return $this->hasMany(Preparacion::class);
    }
}
