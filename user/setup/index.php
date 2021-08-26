<?php

$view = _app('view');
$id = _arg(3);

if ($id) {
    $pageTitle = _t('Edit User');
} else {
    $id = 0;
    $pageTitle = _t('Add New User');
}

$user = _entity('user');

if ($id) {
    $user = db_select('user')
        ->where()->condition('id', $id)
        ->getSingleResult();
}

_app('title', $pageTitle);

$view->data = array(
    'pageTitle' => $pageTitle,
    'id' => $id,
    'user' => $user
);
