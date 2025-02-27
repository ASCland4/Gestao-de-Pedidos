<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Aqui você pode registrar todos os canais de transmissão de eventos que 
| seu aplicativo suporta. Os callbacks de autorização de canal fornecidos 
| são usados ​​para verificar se um usuário autenticado pode ouvir o canal.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
