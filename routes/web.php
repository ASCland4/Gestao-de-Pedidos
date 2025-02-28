<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', 'SobreNosContorller@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoContorller@contato')->name('site.contato');
Route::post('/contato', 'ContatoContorller@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//app
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //produtos
    Route::prefix('/produto')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
        Route::get('/create', [ProdutoController::class, 'create'])->name('produto.create');
        Route::post('/store', [ProdutoController::class, 'store'])->name('produto.store');
        Route::get('/{produto}', [ProdutoController::class, 'show'])->name('produto.show');
        Route::get('/{produto}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
        Route::put('/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
        Route::delete('/{produto}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
    });

    //produtos detalhes
    Route::resource('produto-detalhe', 'ProdutoDetalheController');
    Route::get('produto-detalhe/{id}/edit', 'ProdutoDetalheController@edit')->name('produto-detalhe.edit');
    Route::put('produto-detalhe/{id}', 'ProdutoDetalheController@update')->name('produto-detalhe.update');
    Route::delete('produto-detalhe/{id}', 'ProdutoDetalheController@destroy')->name('produto-detalhe.destroy');

    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');

    Route::get('pedido-produto/create{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    Route::get('pedido-produto/{id}/edit', 'PedidoProdutoController@edit')->name('pedido-produto.edit');
    Route::put('/pedido-produto/{id}', 'PedidoProdutoController@update')->name('pedido-produto.update');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
