<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoContorller extends Controller
{
    public function contato(Request $request) {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        //realizar a validaçao dos dados do formulario recebidos no request
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'

        ];
        
        //exibe as respostas a partir dos erros recebidos no request
        $feedbacks = [
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O campo nome já está em uso',
            'email.email' => 'O campo email deve ser um email válido',
            //'motivo_contatos_id.required' => 'O campo motivo de contato é obrigatório',
            'mensagem.required' => 'O campo mensagem é obrigatório',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',

            'required' => 'o campo :attribute  deve ser preenchido'
        ];
    
        $request->validate($regras, $feedbacks);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }

}
