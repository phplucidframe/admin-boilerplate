<?php

$user = _entity('user');

if ($id) {
    $user = db_select('user')
        ->where()->condition('id', $id)
        ->getSingleResult();
}
