<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ControlePessoa;

class ControleContato extends Model
{
    protected $table = 'contato';

    protected $fillable = ['id_pessoa', 
                           'email',
                           'telefone',
                           'watssap'
                          ];

    public function rules()
    {
        return [
            'id_pessoa' => 'required',
            'email' => 'required'
        ];
    }

    public function pessoa()
    {
        return $this->belongsTo(ControlePessoa::class, 'id_pessoa', 'id');
    }
}
