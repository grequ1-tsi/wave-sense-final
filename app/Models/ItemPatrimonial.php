<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations;

class ItemPatrimonial extends Model
{
    use HasFactory;

    protected $table = 'item';

    protected $fillable = [
        'num_patrimonial',
        'marca',
        'descricao',
        'serial',
        'setor',
        'sala',
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function movimento()
    {
        return $this->belongsTo(Movimento::class);
    }


}