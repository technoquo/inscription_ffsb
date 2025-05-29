<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistroFormulario extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'adultos',
        'adolescentes',
        'menores',
        'combo_cantidad',
        'combo_veg',
        'combo_frites',
        'combo_mix',
        'combo_mix_veg',
        'combo_mix_frites_boison_sauce',
        'combo_mix_frites_veg_boison_sauce',
        'ticket',
        'visite',
        'comentario',
        'email',
        'fullname',
        'total',
    ];
    protected $casts = [
        'adultos' => 'integer',
        'adolescentes' => 'integer',
    ];

      protected $table = 'registros_formulario';
}
