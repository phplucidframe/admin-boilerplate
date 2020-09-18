<?php
$user = new stdClass();
$user->full_name = '';
$user->username = '';
$user->email    = '';
$user->role     = '';

if ($id) {
    $user = db_select('user')
        ->where()->condition('id', $id)
        ->getSingleResult();
}
