<?php

Broadcast::channel('users.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
