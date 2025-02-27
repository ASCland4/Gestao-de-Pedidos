<form method="post" action="{{ isset($produto_detalhe) ? route('produto-detalhe.update', $produto_detalhe) : route('produto-detalhe.store') }}">
    @csrf
    @if (isset($produto_detalhe))
        @method('PUT')
    @endif

    <h2 class="titulo-form">
        {{ isset($produto_detalhe) ? 'Editar Detalhes do Produto' : 'Cadastrar Novo Detalhe' }}
    </h2>

    <div class="form-group">
        <label for="produto_id">ID do Produto</label>
        <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="ID do Produto" class="input-campo">
        <span class="erro">{{ $errors->first('produto_id') }}</span>
    </div>

    <div class="form-group">
        <label for="comprimento">Comprimento</label>
        <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="input-campo">
        <span class="erro">{{ $errors->first('comprimento') }}</span>
    </div>

    <div class="form-group">
        <label for="largura">Largura</label>
        <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="input-campo">
        <span class="erro">{{ $errors->first('largura') }}</span>
    </div>

    <div class="form-group">
        <label for="altura">Altura</label>
        <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="input-campo">
        <span class="erro">{{ $errors->first('altura') }}</span>
    </div>

    <div class="form-group">
        <label for="unidade_id">Unidade de Medida</label>
        <select name="unidade_id" class="input-campo">
            <option>-- Selecione a Unidade --</option>
            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                    {{ $unidade->descricao }}
                </option>
            @endforeach
        </select>
        <span class="erro">{{ $errors->first('unidade_id') }}</span>
    </div>

    <button type="submit" class="botao-enviar">
        {{ isset($produto_detalhe) ? 'Atualizar' : 'Cadastrar' }}
    </button>
</form>

<style>
    .titulo-form {
        text-align: center;
        font-size: 22px;
        margin-bottom: 15px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
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
