<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Cliente;
use App\PedidoProduto;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);
        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras =[
            'cliente_id' => 'exists:clientes,id'
        ];

        $feedback = [
            'cliente_id.exists' => 'O cliente informado nao existe'
        ];

        $request->validate($regras, $feedback);
        
        $pedido = new Pedido();
        $pedido->cliente_id = $request->input('cliente_id');
        $pedido->save();

        return redirect()->route('pedido.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::with(['cliente', 'produtos'])->find($id);

        if (!$pedido) {
            return redirect()->route('pedido.index')->with('error', 'Pedido não encontrado.');
        }
    
        $cliente = $pedido->cliente; // Busca o cliente relacionado ao pedido
    
        return view('app.pedido.show', compact('pedido', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encontra o pedido pelo ID
        $pedido = Pedido::find($id);

        // Remove todos os produtos vinculados ao pedido na tabela pedidos_produtos
        $pedido->produtos()->detach();

        // Remover o produto do pedido
        $pedido->delete();

        return redirect()->route('pedido.index')->with('success', 'Pedido excluído com sucesso.');
    }
}
