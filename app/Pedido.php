<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['cliente_id'];

    public function produtos() {
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')
        ->withPivot('id','created_at', 'updated_at'); 
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
