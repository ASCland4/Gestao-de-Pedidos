<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Site_Contato
//Site_contato
//site_contatos


class SiteContato extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}
