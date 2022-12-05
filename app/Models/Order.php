<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    //Permissão para preencher no banco
    protected $fillable = [
        'user_id',
        'condom_id',
    ];

    //Função que retorna o usuário vinculado com o pedido de acordo com o user_id
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    //Função que retorna o usuário vinculado com o pedido de acordo com a condom_id
    public function condom()
    {
        return $this->hasOne(Condom::class, 'id', 'condom_id');
    }
}
