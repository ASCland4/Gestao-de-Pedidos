@extends('app.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Dashboard</p>
        </div>

        <div class="informacao-pagina">
            <div class="dashboard">
                <!-- Quadro único para Total de Pedidos -->
                <div class="card-pedidos">
                    <h2>Total de Pedidos</h2>
                    <p>{{ $totalPedidos }}</p>
                </div>

                <div class="listas">
                    <!-- Lista de Produtos -->
                    <div class="card-lista">
                        <div class="top-bar">
                            <a href="{{ route('produto.index') }}" class="ver-mais">Ver todos</a>
                        </div>
                        <h2>Produtos</h2>
                        <ul>
                            @foreach ($produtos as $produto)
                                <li>
                                    <span class="nome">{{ $produto->nome }}</span>
                                    <span class="info">{{ $produto->unidade_id }} un.</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Lista de Fornecedores -->
                    <div class="card-lista">
                        <div class="top-bar">
                            <a href="{{ route('app.fornecedor') }}" class="ver-mais">Ver todos</a>
                        </div>
                        <h2>Fornecedores</h2>
                        <ul>
                            @foreach ($fornecedores as $fornecedor)
                                <li>
                                    <span class="nome">{{ $fornecedor->nome }}</span>
                                    <span class="info">{{ $fornecedor->uf }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .card-pedidos {
            background: #007bff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            font-size: 22px;
        }

        .listas {
            display: flex;
            justify-content: center;
            gap: 20px;
            width: 100%;
            max-width: 700px;
        }

        .card-lista {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 320px;
            position: relative;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .ver-mais {
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .ver-mais:hover {
            background: #0056b3;
        }

        .card-lista h2 {
            font-size: 18px;
            text-align: center;
            margin-bottom: 10px;
        }

        .card-lista ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .card-lista li {
            font-size: 14px;
            padding: 8px 0;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
        }

        .card-lista li:last-child {
            border-bottom: none;
        }

        .nome {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .info {
            min-width: 100px;
            text-align: right;
            font-weight: bold;
            color: #555;
        }
    </style>
@endsection
