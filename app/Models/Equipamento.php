<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';

    public $timestamps = false;  

    protected $fillable = [
        'nome',
        'patrimonio',
        'status',
        'setor_id',
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}