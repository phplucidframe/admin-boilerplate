<?php
$success = false;
if (sizeof($_POST)) {
    $post = _post($_POST);
    $post['txtBody'] = _xss($_POST['txtBody']);    # if it is populated by Rich Text Editor
    extract($post);

    $validations['txtTitle'] = array(
        'caption'   => _t('Title'),
        'value'     => $txtTitle,
        'rules'     => array('mandatory'),
    );

    $validations['cboCategory'] = array(
        'caption'   => _t('Category'),
        'value'     => $cboCategory,
        'rules'     => array('mandatory'),
    );

    $validations['txtBody'] = array(
        'caption'   => _t('Body'),
        'value'     => $txtBody,
        'rules'     => array('mandatory')
    );

    if (form_validate($validations)) {
        if ($hidEditId) {
            # edit
            $data = array(
                'id'                => $hidEditId,
                'title_'.$hidLang   => $txtTitle,
                'body_'.$hidLang    => $txtBody,
                'cat_id'            => $cboCategory,
            );

            if ($hidLang == $lc_defaultLang) {
                # default language
                $useSlug = true;
                $data['title']  = $txtTitle;
                $data['body']   = $txtBody;
            } else {
                $useSlug = false;
            }

            if (isset($txtSlug) && $txtSlug) {
                # if user entered slug manually
                $postSlug = _slug($txtSlug, 'post', array('id !=' => $hidEditId));
                $data['slug'] = $postSlug;
            }

            if (db_update('post', $data, $useSlug)) {
                $success = true;
            }
        } else {
            # new
            $data = array(
                'title'             => $txtTitle,
                'body'              => $txtBody,
                'title_'. $hidLang  => $txtTitle,
                'body_'. $hidLang   => $txtBody,
                'cat_id'            => $cboCategory,
                'user_id'           => $_auth->id
            );

            if (isset($txtSlug) && $txtSlug) {
                # if user entered slug manually
                $postSlug = _slug($txtSlug, 'post');
                $data['slug'] = $postSlug;
            }
            if (db_insert('post', $data)) {
                $success = true;
            }
        }
        if ($success) {
            form_set('success', true);
            form_set('redirect', _url(_cfg('baseDir') . '/post/list'));
        }
    } else {
        form_set('error', validation_get('errors'));
    }
}
# Ajax response
form_respond('frmPost');
