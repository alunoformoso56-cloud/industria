<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'matricula',
        'cargo',
        'setor_id',
    ];

    public $timestamps = false;

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}