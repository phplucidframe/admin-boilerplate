<?php
/**
 * DELETE post
 */
if (_isHttpPost()) {
    $post = _post();
    extract($post);
    if (isset($action) && $action == 'delete' && isset($hidDeleteId) && $hidDeleteId) {
        # DELETE
        db_delete('post', array('id' => $hidDeleteId));
    }
}
