@if (isset($pedido->id))
    <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{ route('pedido.store') }}">
            @csrf
@endif
<div class="form-group">
    <select name="cliente_id" class="input-campo">
        <option>-- Selecione um Cliente --</option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}"
                {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}
            </option>
        @endforeach
    </select>
    <span class="erro">{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}</span>
</div>

<button type="submit" class="botao-enviar">
    {{ isset($pedido) ? 'Atualizar' : 'Cadastrar' }}
</button>

<style>
    .form-group {
        margin-bottom: 15px;
    }

    .input-campo {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .erro {
        color: red;
        font-size: 14px;
        display: block;
        margin-top: 5px;
    }

    .botao-enviar {
        width: 100%;
        padding: 12px;
        background: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .botao-enviar:hover {
        background: #0056b3;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .input-campo {
            font-size: 14px;
            padding: 8px;
        }

        .botao-enviar {
            font-size: 16px;
            padding: 10px;
        }
    }
</style>
