@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>

        <div class="align">
            <div class="menu2">
                <ul>
                    <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                </ul>
            </div>
    
            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores])
                    @endcomponent
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
            padding: 0;
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
            font-weight: bold;
        }

        .menu2 a:hover {
            background: #0056b3;
        }

        .align {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
@endsection