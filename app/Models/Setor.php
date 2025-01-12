<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'setores';

    protected $fillable = [
        'nome',
        'sigla',
        'users_id',
    ];

    public function itemPatrimonial()
    {
        return $this->hasMany(ItemPatrimonial::class);
    }

    public function sala()
    {
        return $this->hasMany(Sala::class);
    }

    public function responsavel()
    {
        return $this->hasOne(User::class);
    }


}