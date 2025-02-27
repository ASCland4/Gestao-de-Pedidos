@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Visualizar produto</p>
        </div>

        <div class="align">
            <div class="menu2">
                <ul>
                    <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                    <li><a href="">Consulta</a></li>
                    <li><a href="{{ route('produto-detalhe.edit', ['id'=>$produto->id]) }}">Detalhe do Produto</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div class="card-detalhe">
                    <table>
                        <p><strong>ID:</strong> {{ $produto->id }}</p>
                        <p><strong>Nome:</strong> {{ $produto->nome }}</p>
                        <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
                        <p><strong>Peso:</strong> {{ $produto->peso }} kg</p>
                        <p><strong>Unidade de Medida:</strong> {{ $produto->unidade_id }}</p>
                    </table>
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
            border: 1px; 
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