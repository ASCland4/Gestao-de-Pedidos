@extends('app.layouts.basico')

@section('titulo', 'Detalhes')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Visualizar produto</p>
        </div>

        <div class="align">
            <div class="menu2">
                <ul>
                    <li><a href="{{ route('produto-detalhe.index') }}">Vol tar</a></li>
                    <li><a href="{{ route('produto.edit', $produtoDetalhe->produto->id) }}">Editar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div class="card-detalhe">
                    <p><strong>Nome:</strong>{{ $produtoDetalhe->produto->nome ?? 'Produto Não Informado' }}</p>
                    <p><strong>Descrição:</strong> {{ $produtoDetalhe->produto->descricao ?? 'Não informada' }}</p>
                    <p><strong>Comprimento:</strong> {{ $produtoDetalhe->comprimento }}</p>
                    <p><strong>Largura:</strong> {{ $produtoDetalhe->largura }}</p>
                    <p><strong>Altura:</strong> {{ $produtoDetalhe->altura }}</p>
                    <p><strong>Unidade:</strong> {{ $produtoDetalhe->unidade_id }}</p>
                </div>
            </div>
        </div> 
    </div>
    <style>
        .menu2 ul {
            list-style: none;
            display: flex;
            gap: 15px;
            justify-content: center;
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
        }
        .menu2 a:hover {
            background: #0056b3;
        }

        .align {
            flex-direction: column;
            display: flex;
            align-items: center
        }

        .informacao-pagina {
            width: 50%;
            display: flex;
            justify-content: center;
        }
        .card-detalhe {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            text-align: left;
        }
        .card-detalhe p {
            font-size: 18px;
            margin: 5px 0;
        }
    </style>
@endsection