<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function detalhe() {
        return $this->hasOne(ProdutoDetalhe::class, 'produto_id', 'id');
    }

    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
    }

    public function pedidos() {
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id')
        ->withPivot('id', 'created_at', 'updated_at');
    }
}
