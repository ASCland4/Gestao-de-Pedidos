@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhes do Pedido</p>
        </div>

        <div class="align">
            <div class="menu2">
                <ul>
                    <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div class="card-detalhe">
                    <h2>Pedido #{{ $pedido->id }}</h2>
                    <p><strong>Cliente:</strong> {{ $pedido->$cliente->nome ?? 'N/A' }}</p>

                    <div class="tabela-container">
                        <h3>Produtos do Pedido</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Peso</th>
                                    <th>Data de Inclusão</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido->produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->id }}</td>
                                        <td>{{ $produto->nome }}</td>
                                        <td>{{ $produto->descricao }}</td>
                                        <td>{{ $produto->peso }} kg</td>
                                        <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
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
    </style>

@endsection
