@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{ route('cliente.create') }}" class="botao">Novo</a></li>
                <li><a href="" class="botao botao-secundario">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <table class="tabela-container">
                <thead>
                    <head>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </head>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>
                                <a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}"
                                    class="botao-acoes visualizar">Visualizar</a>
                            </td>
                            <td>
                                <a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}"
                                    class="botao-acoes editar">Editar</a></td>
                            <td>
                                <form id="form_{{ $cliente->id }}" method="post"
                                    action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#"
                                        onclick="document.getElementById('form_{{ $cliente->id }}')
                                                .submit()"
                                        class="botao-acoes excluir">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>

            <div class="paginacao"> {{ $clientes->appends($request)->links() }}
                <p>
                    Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }}
                    (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
                </p>
            </div>

        </div>
    </div>

    <style>
        .tabela-container {
            width: 90%;
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
