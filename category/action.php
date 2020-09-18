<?php
$success = false;
if (sizeof($_POST)) {
    $post = _post($_POST);
    extract($post);

    if (isset($action) && $action == 'delete' && isset($hidDeleteId) && $hidDeleteId) {
        # DELETE category
        if (db_delete('category', array('id' => $hidDeleteId))) {
            $success = true;
        }
    } else {
        # NEW/EDIT
        $validations = array(
            'txtName' => array(
                'caption'   => _t('Name'). ' ('._langName($lc_defaultLang).')',
                'value'     => $txtName,
                'rules'     => array('mandatory'),
                'parameters'=> array($hidEditId)
            )
        );

        if (form_validate($validations)) {
            if ($hidEditId) {
                $data = array(
                    'id' => $hidEditId,
                    'name' => $txtName
                );
                # Get translation strings for "catName"
                $data = array_merge($data, _postTranslationStrings($post, array('name' => 'txtName')));

                if (db_update('category', $data, false)) {
                    $success = true;
                }
            } else {
                $data = array(
                    'name' => $txtName,
                );
                # Get translation strings for "pptName"
                $data = array_merge($data, _postTranslationStrings($post, array('name' => 'txtName')));

                if (db_insert('category', $data)) {
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
form_respond('frmCategory'); # Ajax response
