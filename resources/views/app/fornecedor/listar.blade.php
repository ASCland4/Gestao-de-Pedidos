@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="titulo-pagina-2">
        <p>Listagem de Fornecedores</p>
    </div>

    <div class="menu2">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}" class="botao">Novo Fornecedor</a></li>
            <li><a href="{{ route('app.fornecedor') }}" class="botao botao-secundario">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div class="tabela-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>
                                <a href="{{ $fornecedor->site }}" target="_blank">
                                    {{ $fornecedor->site }}
                                </a>
                            </td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td>
                                <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}" class="botao-acoes editar">✏️</a>
                            </td>
                            <td>
                                <form id="form_{{ $fornecedor->id }}" method="post" action="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $fornecedor->id }}').submit()" class="botao-acoes excluir">🗑️</a>
                                </form>
                            </td>
                        </tr>
                        <tr class="pedido-info">
                            <td colspan="6">
                                <strong>Produtos Relacionados:</strong>
                                @foreach ($fornecedor->produtos as $produto)
                                    <span class="pedido-link">{{ $produto->nome }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="paginacao">
            {{ $fornecedores->appends($request)->links() }}
            <p>
                Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }}
                (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
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

        @media (max-width: 768px) {
            table {
                min-width: 600px;
            }

            th, td {
                font-size: 14px;
                padding: 5px;
            }
        }

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

