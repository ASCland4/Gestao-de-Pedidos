@extends('app.layouts.basico')

@section('titulo', 'Detalhes')

@section('conteudo')
    <div class="titulo-pagina-2">
        <p>Detalhes do Produtos</p>
    </div>

    <div class="menu2">
        <ul>
            <li><a href="{{ route('produto-detalhe.create') }}" class="botao">Novo Registro</a></li>
            <li><a href="{{ route('produto.index') }}" class="botao botao-secundario">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div class="tabela-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>    
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th colspan="3">Ações</th>
                    </tr>   
                </thead>
                <tbody>
                    @foreach ($produtoDetalhes as $detalhe)
                        <tr>
                            <td>{{ $detalhe->produto->nome ?? 'Produto não encontrado' }}</td>
                            <td>{{ $detalhe->produto->peso ?? '-' }} kg</td>
                            <td>{{ $detalhe->produto->unidade_id ?? '-' }}</td>
                            <td>{{ $detalhe->comprimento ?? '-' }}</td>
                            <td>{{ $detalhe->largura ?? '-' }}</td>
                            <td>{{ $detalhe->altura ?? '-' }}</td>
                            <td>
                                <a href="{{ route('produto-detalhe.show', ['produto_detalhe'=> $detalhe->id]) }}" class="botao-acoes visualizar">Visualizar</a>
                            </td>
                            <td>
                                <a href="{{ route('produto-detalhe.edit', ['id'=> $detalhe->id]) }}" class="botao-acoes editar">Editar</a>
                            </td>
                            <td>
                                <form class="botao-acoe" action="{{ route('produto-detalhe.destroy', $detalhe->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este detalhe do produto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="botao-acoes excluir">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>   
            </table>
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
            table-layout: fixed;
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
        
        .botao-acoes {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .botao-acoe {
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        .visualizar {
            background: #17a2b8;
            color: white;
        }

        .editar {
            background: #ffc107;
            color: white;
        }
        
        .botao-acoes.excluir {
            background: #dc3545;
            color: white;
        }

        .botao-acoes.excluir {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border: none;
        }

        .botao-acoes.excluir:hover {
            opacity: 0.8;
        }

        .botao-acoes:hover {
            opacity: 0.8;
        }
    </style>
@endsection