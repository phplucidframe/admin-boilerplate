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
            'name' => array(
                'caption'       => _t('Name') . ' (' . _langName(_defaultLang()) . ')',
                'value'         => $post['name'],
                'rules'         => array('mandatory'),
                'parameters'    => array($post['id'])
            )
        );

        if (form_validate($validations)) {
            $data = array(
                'name' => $post['name']
            );

            # Get translation strings for "catName"
            $data = array_merge($data, _postTranslationStrings($post, array('name' => 'name')));

            if (db_save($table, $data, $post['id'])) {
                $success = true;
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
