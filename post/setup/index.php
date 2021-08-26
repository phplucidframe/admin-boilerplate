<?php

$view       = _app('view');
$lang       = _getLang();
$pageTitle  = _t('Add New Post');
$id         = _arg(3);

if ($id) {
    $pageTitle = _t('Edit Post');
} else {
    if ($lang != _defaultLang()) {
        _redirect(_cfg('baseDir') . '/post/setup/', null, _defaultLang());
    }
}

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

_app('title', $pageTitle);

$view->addData('pageTitle', $pageTitle);
$view->addData('lang', $lang);
$view->addData('id', $id);
$view->addData('post', $post);
$view->addData('categories', $categories);
