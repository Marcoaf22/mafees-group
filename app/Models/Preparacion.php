<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparacion extends Model
{
    use HasFactory;

    protected $table = 'preparaciones';

    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'cantidad',
        'fecha',
        'estado',
        'tanque_id',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i',
    ];

    public function tanque()
    {
        return $this->belongsTo(Tanque::class);
    }
}
