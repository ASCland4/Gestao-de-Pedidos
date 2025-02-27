@extends('app.layouts.basico')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Editar Produto no Pedido</p>
        </div>

        <div class="align">
            <div class="menu2">
                <ul>
                    <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div class="card-detalhe">
                    <h2>Detalhes do Pedido</h2>
                    <p><strong>ID do Pedido:</strong> {{ $pedido->id }}</p>
                    <p><strong>Cliente:</strong> {{ $pedido->cliente_id }}</p>

                    <div class="form-container">
                        <h3>Editar Produto</h3>
                        <form action="{{ route('pedido-produto.update', ['id' => $pedidoProduto->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="campo-form">
                                <label for="produto_id">Produto</label>
                                <select name="produto_id" id="produto_id" required>
                                    @foreach ($produtos as $produto)
                                        <option value="{{ $produto->id }}" {{ $produto->id == $pedidoProduto->produto_id ? 'selected' : '' }}>
                                            {{ $produto->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="campo-form">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" name="quantidade" id="quantidade" value="{{ $pedidoProduto->quantidade }}" required>
                            </div>

                            <button type="submit" class="botao-acoes editar">Salvar Alterações</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .campo-form {
            margin-bottom: 15px;
        }

        .campo-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .campo-form select, 
        .campo-form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .botao-acoes.editar {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            border: none;
        }

        .botao-acoes.editar:hover {
            background: #218838;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .informacao-pagina {
                width: 90%;
            }
        }
    </style>

@endsection
