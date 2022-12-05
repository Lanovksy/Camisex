<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condom extends Model
{
    use HasFactory, SoftDeletes;

    //Permissão para preencher no banco
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'brand_id',
        'description',
        'file',
    ];

    //Função que retorna a marca vinculada com a camisinha de acordo com a brand_id
    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
