<?php

$table = 'category';
$success = false;

if (_isHttpPost()) {
    $post = _post();

    if (isset($post['action']) && $post['action'] == 'delete' && !empty($post['id'])) {
        # DELETE category
        if (db_delete($table, array('id' => $post['id']))) {
            $success = true;
        }
    } else {
        # NEW/EDIT
        $validations = array(
            'txtName' => array(
                'caption'       => _t('Name') . ' (' . _langName(_defaultLang()) . ')',
                'value'         => $post['txtName'],
                'rules'         => array('mandatory'),
                'parameters'    => array($post['id'])
            )
        );

        if (form_validate($validations)) {
            if ($post['id']) {
                $data = array(
                    'id' => $post['id'],
                    'name' => $post['txtName']
                );
                # Get translation strings for "catName"
                $data = array_merge($data, _postTranslationStrings($post, array('name' => 'txtName')));

                if (db_update($table, $data, false)) {
                    $success = true;
                }
            } else {
                $data = array(
                    'name' => $post['txtName'],
                );
                # Get translation strings for "pptName"
                $data = array_merge($data, _postTranslationStrings($post, array('name' => 'txtName')));

                if (db_insert($table, $data)) {
                    $success = true;
                }
            }
        } else {
            form_set('error', validation_get('errors'));
        }
    }
    if ($success) {
        form_set('success', true);
        form_set('callback', 'LC.Page.Category.list()'); # Ajax callback
    }
}

form_respond('form-category'); # Ajax response
