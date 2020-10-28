<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ControleContato;

class ControlePessoa extends Model
{
    protected $table = 'pessoa';

    protected $fillable = ['nome', 
                           'endereco'
                          ];
    
    public function rules()
    {
        return [
            'nome' => 'required',
            'endereco' => 'required'
        ];
    }
    
    public function contato() {
        return $this->hasMany(ControleContato::class, 'id_pessoa', 'id');
    }
}
