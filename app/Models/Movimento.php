<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations;

class Movimento extends Model
{
    use HasFactory;

    protected $table = 'movimento';

    protected $fillable = [
        'num_patrimonial',
        'status',
        'salas_id',
        'data',
        'horario',
    ];

    public function item()
    {
        return $this->hasOne(ItemPatrimonial::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'salas_id');
    }


}