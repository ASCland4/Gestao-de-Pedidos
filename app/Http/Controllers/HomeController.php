<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Pedido;
use App\Fornecedor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        //$motivo_contatos = MotivoContato::all();

        // Contagem dos registros
        $totalProdutos = Produto::count();
        $totalPedidos = Pedido::count();
        $totalFornecedores = Fornecedor::count();
        
         // Obtendo listas resumidas (limite de 5)
        $produtos = Produto::latest()->limit(5)->get();
        $fornecedores = Fornecedor::latest()->limit(5)->get();

        return view('app.home', compact('totalProdutos', 'totalPedidos', 'totalFornecedores', 'produtos', 'fornecedores'));
    }
}
