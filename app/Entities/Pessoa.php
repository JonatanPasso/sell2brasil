<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    public $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'sell_pessoas';

    protected $fillable = [
       'nome',
       'sobrenome',
       'email',
       'endereco',
       'cidade',
       'estado',
       'cep'
    ];

    public static function verificaCadastro($request)
    {
        return self::whereEmail($request)->first();
    }

    public static function listaPessoaPorId($request)
    {
        return self::whereId($request->id)->first();
    }
}
