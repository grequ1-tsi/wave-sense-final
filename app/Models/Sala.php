<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations;

class Sala extends Model
{
    use HasFactory;

    protected $table = 'salas';

    protected $fillable = [
        'numSala',
        'setores_id',
        'dispositivo',
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function item()
    {
        return $this->belongsTo(ItemPatrimonial::class);
    }

    public function movimento()
    {
        return $this->belongsTo(Movimento::class);
    }


}