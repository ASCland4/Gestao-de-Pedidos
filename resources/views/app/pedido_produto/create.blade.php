@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="align">
            <div class="menu2">
                <ul>
                    <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                    <li><a href="#">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div class="card-detalhe">
                    <h2>Detalhes do Pedido</h2>
                    <p><strong>ID do Pedido:</strong> {{ $pedido->id }}</p>
                    <p><strong>Cliente:</strong> {{ $pedido->cliente_id }}</p>

                    <div class="form-container">
                        <h3>Adicionar Produto</h3>
                        @component('app.pedido_produto._components.from_create', ['pedido' => $pedido, 'produtos' => $produtos])
                        @endcomponent
                    </div>

                    <div class="tabela-container">
                        <h3>Itens do Pedido</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Produto</th>
                                    <th>Data de Inclusão</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido->produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->id }}</td>
                                        <td>{{ $produto->nome }}</td>
                                        <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('pedido-produto.edit', ['id' => $produto->pivot->id]) }}" class="botao-acoes editar">Editar</a>
                                        </td>
                                        <td>
                                            <form id="form_{{ $produto->pivot->id }}" method="post"
                                                action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()" class="botao-acoes excluir">Excluir</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .align {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .menu2 ul {
            list-style: none;
            display: flex;
            gap: 15px;
            justify-content: center;
            padding: 0;
        }

        .menu2 li {
            display: inline;
        }

        .menu2 a {
            text-decoration: none;
            padding: 10px 15px;
            background: #007BFF;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .menu2 a:hover {
            background: #0056b3;
        }

        .informacao-pagina {
            width: 40%;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .card-detalhe {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: left;
        }

        .card-detalhe h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
            font-weight: bold;
        }

        .card-detalhe p {
            font-size: 18px;
            margin: 8px 0;
            color: #555;
        }

        .form-container {
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        .tabela-container {
            margin-top: 20px;
            width: 100%;
            overflow-x: auto;
        }

        .tabela-container table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .tabela-container th, .tabela-container td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .tabela-container th {
            background: #007BFF;
            color: white;
            font-weight: bold;
        }

        .botao-acoes {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s;
        }

        .botao-acoes.editar {
            background: #28a745;
            color: white;
        }

        .botao-acoes.editar:hover {
            background: #218838;
        }

        .botao-acoes.excluir {
            background: #dc3545;
            color: white;
        }

        .botao-acoes.excluir:hover {
            background: #c82333;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .informacao-pagina {
                width: 90%;
            }

            .menu2 ul {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .menu2 a {
                font-size: 14px;
                padding: 10px 14px;
            }

            .card-detalhe h2 {
                font-size: 20px;
            }

            .card-detalhe p {
                font-size: 16px;
            }
        }
    </style>

@endsection
