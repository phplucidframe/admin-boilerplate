<?php
$success = false;

if (_isHttpPost()) {
    $post = _post();
    $post['body'] = _xss($_POST['body']);    # if it is populated by Rich Text Editor

    $validations['title'] = array(
        'caption'   => _t('Title'),
        'value'     => $post['title'],
        'rules'     => array('mandatory'),
    );

    $validations['cboCategory'] = array(
        'caption'   => _t('Category'),
        'value'     => $post['category'],
        'rules'     => array('mandatory'),
    );

    $validations['body'] = array(
        'caption'   => _t('Body'),
        'value'     => $post['body'],
        'rules'     => array('mandatory')
    );

    if (form_validate($validations)) {
        if ($post['id']) {
            # edit
            $data = array(
                'id'                        => $post['id'],
                'title_' . $post['lang']    => $post['title'],
                'body_' . $post['lang']     => $post['body'],
                'cat_id'                    => $post['category'],
            );

            if ($post['lang'] == _defaultLang()) {
                # default language
                $useSlug = true;
                $data['title']  = $post['title'];
                $data['body']   = $post['body'];
            } else {
                $useSlug = false;
            }

            if (isset($post['slug']) && $post['slug']) {
                # if user entered slug manually
                $postSlug = _slug($post['slug'], 'post', array('id !=' => $post['id']));
                $data['slug'] = $postSlug;
            }

            if (db_update('post', $data, $useSlug)) {
                $success = true;
            }
        } else {
            # new
            $data = array(
                'title'                 => $post['title'],
                'body'                  => $post['body'],
                'title_'. $post['lang'] => $post['title'],
                'body_'. $post['lang']  => $post['body'],
                'cat_id'                => $post['category'],
                'user_id'               => _app('auth')->id,
            );

            if (isset($post['slug']) && $post['slug']) {
                # if user entered slug manually
                $postSlug = _slug($post['slug'], 'post');
                $data['slug'] = $postSlug;
            }
            if (db_insert('post', $data)) {
                $success = true;
            }
        }
        if ($success) {
            form_set('success', true);
            form_set('redirect', _url(_cfg('baseDir') . '/post/list', array('lang' => $post['lang'])));
        }
    } else {
        form_set('error', validation_get('errors'));
    }
}
# Ajax response
form_respond('form-post');
