<?php
$post = new stdClass();

$post->body = '';
$post->title = '';
$post->slug = '';
$post->cat_id = '';

if ($id) {
    $post = db_select('post', 'p')
        ->where()
        ->condition('id', $id)
        ->getSingleResult();
    if ($post) {
        $post = _getTranslationStrings($post, array('title', 'body'), $lang);
    } else {
        _redirect(_cfg('baseDir') . '/post/list');
    }
}

$condition = array('deleted' => null);
if ($id) {
    $condition['and'] = array(
        'id' => $post->cat_id,
        'deleted !=' => null
    );
}

$categories = db_select('category')
    ->orWhere($condition)
    ->orderBy('name')
    ->getResult();
