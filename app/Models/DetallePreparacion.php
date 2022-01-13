<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePreparacion extends Model
{
    use HasFactory;

    protected $table = 'detalle_preparaciones';

    // protected $primaryKey = ['preparacion_id', 'producto_id'];
    // protected $keyType = ['int', 'int'];
    // public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'preparacion_id',
        'producto_id',
        'cantidad',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
