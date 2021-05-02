<?php
/**
 * DELETE post
 */
if (_isHttpPost()) {
    $post = _post();

    if (isset($post['action']) && $post['action'] == 'delete' && !empty($post['id'])) {
        # DELETE
        db_delete('post', array('id' => $post['id']));
    }
}
