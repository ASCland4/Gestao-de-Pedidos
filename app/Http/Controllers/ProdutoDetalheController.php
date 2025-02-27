<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdutoDetalhe;
use App\Unidade;

class ProdutoDetalheController extends Controller
{
    /**
     * Exibe uma lista de detalhes dos produtos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtoDetalhes = ProdutoDetalhe::with('produto')->get();
        return view('app.produto_detalhe.index', compact('produtoDetalhes'));
    }

    /**
     * Mostra o formulário de criação de um novo detalhe de produto.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', compact('unidades'));
    }

    /**
     * Armazena um novo detalhe de produto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'produto_id'  => 'required|exists:produtos,id',
            'comprimento' => 'required|numeric',
            'largura'     => 'required|numeric',
            'altura'      => 'required|numeric',
            'unidade_id'  => 'required|exists:unidades,id',
        ]);

        // Verifica se já existe um detalhe para o produto
        $produtoDetalhe = ProdutoDetalhe::where('produto_id', $request->produto_id)->first();

        if ($produtoDetalhe) {
            $produtoDetalhe->update($request->all());
        } else {
            ProdutoDetalhe::create($request->all());
        }

        return redirect()->route('produto-detalhe.index')->with('success', 'Detalhes do produto salvos com sucesso!');
    }

    /**
     * Exibe os detalhes de um produto específico.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtoDetalhe = ProdutoDetalhe::with('produto')->findOrFail($id);

        return view('app.produto_detalhe.show', compact('produtoDetalhe'));
    }

    /**
     * Mostra o formulário de edição de um detalhe de produto.
     * @param  Interteger $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoDetalhe = ProdutoDetalhe::with('produto')->find($id);

        if (!$produtoDetalhe) {
            return redirect()->route('produto-detalhe.index')
            ->with('error', 'Produto detalhe não encontrado!');
        }
    
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', compact('produtoDetalhe', 'unidades'));
    }

    /**
     * Atualiza um detalhe de produto existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\ProdutoDetalhe $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $request->validate([
            'produto_id'  => 'required|exists:produtos,id',
            'comprimento' => 'required|numeric',
            'largura'     => 'required|numeric',
            'altura'      => 'required|numeric',
            'unidade_id'  => 'required|exists:unidades,id',
        ]);

        $produtoDetalhe->update($request->all());
        return redirect()->route('produto-detalhe.show', $produtoDetalhe->id)->with('success', 'Detalhes do produto atualizados com sucesso!');
    }

    /**
     * Remove um detalhe de produto do banco de dados.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busca o detalhe do produto pelo ID
        $produtoDetalhe = ProdutoDetalhe::find($id);

        //Verifica se o produto detalhe existe
        if (!$produtoDetalhe) {
            return redirect()->route('produto-detalhe.index')->with('error', 'Produto detalhe não encontrado!');
        }

        // Deleta o registro
        $produtoDetalhe->delete();

        return redirect()->route('produto-detalhe.index')->with('success', 'Detalhes do produto removidos com sucesso!');
    }
}
