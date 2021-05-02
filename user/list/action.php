<?php
/**
 * DELETE user
 */
if (_isHttpPost()) {
    $post = _post();

    if (isset($post['action']) && $post['action'] == 'delete' && !empty($post['id'])) {
        # DELETE
        db_delete('user', array('id' => $post['id']));
    }
}
