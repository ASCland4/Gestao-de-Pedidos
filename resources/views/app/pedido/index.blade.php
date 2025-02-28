@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="titulo-pagina-2">
        <p>Listagem de Pedidos</p>
    </div>

    <div class="menu2">
        <ul>
            <li><a href="{{ route('pedido.create') }}" class="botao">Novo</a></li>
            <li><a href="" class="botao botao-secundario">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div class="tabela-container">
            <table>
                <thead>
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}"
                                    class="pedido-info">Produtos</a></td>
                            <td>
                                <a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}" 
                                    class="botao-acoes visualizar">Visualizar</a>
                            </td>
                            <td>
                                <form id="form_{{ $pedido->id }}" method="post"
                                    action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}')
                                        .submit()" class="botao-acoes excluir">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Paginação -->
        <div class="paginacao"> {{ $pedidos->appends($request)->links() }}
            <p>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }}
                (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </p>
        </div>
    </div>

    <style>
        .tabela-container {
            width: 70%;
            margin: 0 auto;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            min-width: 800px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            word-break: break-word;
        }

        th {
            font-size: 14px;
            white-space: nowrap; /* Evita quebra de palavras únicas */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        thead {
            background: #007bff;
            color: white;
        }

        .pedido-info {
            display: inline-block;
            padding: 3px 6px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 3px;
        }

        .pedido-info:hover {
            background: #218838;
        }

        .botao-acoes {
            display: inline-block;
            padding: 5px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .visualizar {
            background: #17a2b8;
            color: white;
        }

        .excluir {
            background: #dc3545;
            color: white;
        }

        .botao-acoes:hover {
            opacity: 0.8;
        }

        .paginacao {
            text-align: center;
            margin-top: 20px;
            padding-bottom: 10px;
        }

        /* Responsividade para telas menores */
        @media (max-width: 768px) {
            table {
                min-width: 600px;
            }

            th, td {
                font-size: 14px; /* Reduz tamanho da fonte */
                padding: 5px;
            }
        }

        /* Responsividade extrema (celulares pequenos) */
        @media (max-width: 480px) {
            table {
                min-width: 100%;
            }

            th, td {
                font-size: 12px;
                padding: 3px;
            }

            .botao-acoes {
                font-size: 12px;
                padding: 3px 5px;
            }
        }
    </style>

@endsection
