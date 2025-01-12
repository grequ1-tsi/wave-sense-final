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
        'sala',
        'data',
        'horario',
    ];

    public function item()
    {
        return $this->hasOne(ItemPatrimonial::class);
    }

    public function sala()
    {
        return $this->hasOne(Sala::class);
    }


}