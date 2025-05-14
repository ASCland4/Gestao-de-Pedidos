<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas web para seu aplicativo. Essas 
| rotas são carregadas pelo RouteServiceProvider dentro de um grupo que 
| contém o grupo de middleware "web". Agora crie algo ótimo!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('auth')->prefix('/app')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    Route::prefix('/produto')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
        Route::get('/create', [ProdutoController::class, 'create'])->name('produto.create');
        Route::post('/store', [ProdutoController::class, 'store'])->name('produto.store');
        Route::get('/{produto}', [ProdutoController::class, 'show'])->name('produto.show');
        Route::get('/{produto}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
        Route::put('/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
        Route::delete('/{produto}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
    });

    Route::resource('produto-detalhe', ProdutoDetalheController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('pedido', PedidoController::class);

    Route::get('pedido-produto/create/{pedido}', [PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', [PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    Route::get('pedido-produto/{id}/edit', [PedidoProdutoController::class, 'edit'])->name('pedido-produto.edit');
    Route::put('/pedido-produto/{id}', [PedidoProdutoController::class, 'update'])->name('pedido-produto.update');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}', [PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
