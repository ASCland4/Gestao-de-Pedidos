@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="titulo-pagina-2">
        <p>Listagem de Produtos</p>
    </div>

    <div class="menu2">
        <ul>
            <li><a href="{{ route('produto.create') }}" class="botao">Novo Produto</a></li>
            <li><a href="{{ route('produto-detalhe.index') }}" class="botao botao-secundario">Detalhe do Produto</a></li>
            <!-- Construir link para uma consultar detalhada dos produtos -->
        </ul>
    </div>

    <div class="informacao-pagina">
        <div class="tabela-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Site do Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th colspan="3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome ?? 'Sem fornecedor' }}</td>
                            <td>
                                @if ($produto->fornecedor)
                                    <a href="{{ $produto->fornecedor->site }}" target="_blank">
                                        {{ $produto->fornecedor->site }} </a>
                                @else
                                    Sem site cadastrado
                                @endif
                            </td>

                            <td>{{ $produto->peso }} kg</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->detalhe->comprimento ?? '-' }}</td>
                            <td>{{ $produto->detalhe->largura ?? '-' }}</td>
                            <td>{{ $produto->detalhe->altura ?? '-' }}</td>
                            <td>
                                <a href="{{ route('produto.show', ['produto' => $produto->id]) }}"
                                    class="botao-acoes visualizar">👁️</a>
                            </td>
                            <td>
                                <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}"
                                    class="botao-acoes editar">✏️</a>
                            </td>
                            <td>
                                <form id="form_{{ $produto->id }}" method="post"
                                    action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#"
                                        onclick="document.getElementById('form_{{ $produto->id }}').submit()"
                                        class="botao-acoes excluir">🗑️</a>
                                </form>
                            </td>
                        </tr>
                        <tr class="pedido-info">
                            <td colspan="12">
                                <strong>Pedidos Relacionados:</strong>
                                @foreach ($produto->pedidos as $pedido)
                                    <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}"
                                        class="pedido-link">
                                        Pedido #{{ $pedido->id }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="paginacao"> {{ $produtos->appends($request)->links() }}
            <p>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }}
                (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </p>
        </div>
    </div>

    <style>
        .tabela-container {
            width: 98%;
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
            background: #f8f9fa;
        }

        .pedido-link {
            display: inline-block;
            padding: 3px 6px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 3px;
        }

        .pedido-link:hover {
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

        .editar {
            background: #ffc107;
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
