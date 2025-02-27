@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Adicionar Detalhes do Produto</p>
        </div>

        <div class="align">
            <div class="menu2">
                <ul>
                    <li><a href="{{ route('produto-detalhe.index') }}">Voltar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div class="card-detalhe">
                    <h2>Novo Detalhe do Produto</h2>
                    <p>Preencha as informações abaixo para adicionar um novo detalhe ao produto.</p>
                    
                    <div class="form-container">
                        @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
                        @endcomponent
                    </div>
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
            width: 100%;
        }
        
        .informacao-pagina {
            width: 40%;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .card-detalhe {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            text-align: left;
        }

        .card-detalhe h2 { 
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
            font-weight: bold;
        }

        .card-detalhe p {
            font-size: 18px;
            margin: 8px 0;
            color: #555;
        }

        .form-container {
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .informacao-pagina {
                width: 90%;
            }

            .menu2 ul {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .menu2 a {
                font-size: 14px;
                padding: 10px 14px;
            }

            .card-detalhe h2 {
                font-size: 20px;
            }

            .card-detalhe p {
                font-size: 16px;
            }
        }
    </style>
@endsection