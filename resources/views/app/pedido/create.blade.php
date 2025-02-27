@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div>

        <div class="titulo-pagina-2">
            <p>Adicionar pedido</p>
        </div>

        <div class="align">
            <div class="menu2">
                <ul>
                    <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                    <li><a href="">Consulta</a></li>
                </ul>
            </div>
    
            <div class="informacao-pagina">
                <div class="form-container">
                    @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
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
            width: 100%;
        }
        
        .informacao-pagina {
            width: 40%;
            display: flex;
            justify-content: center;
            margin-top: 20px;
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