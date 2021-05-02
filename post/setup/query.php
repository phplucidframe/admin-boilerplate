<?php

$post = _entity('post');

if ($id) {
    $post = db_select('post', 'p')
        ->where()
        ->condition('id', $id)
        ->getSingleResult();
    if (!$post) {
        _page404();
    }
}

$post = _getTranslationStrings($post, array('title', 'body'), $lang);

$condition = array('deleted' => null);
if ($id) {
    $condition['$and'] = array(
        'id' => $post->cat_id,
        'deleted !=' => null
    );
}

$categories = db_select('category')
    ->orWhere($condition)
    ->orderBy('name')
    ->getResult();
