<?php
/**
 * DELETE user
 */
if (_isHttpPost()) {
    $post = _post();
    extract($post);
    if (isset($action) && $action == 'delete' && isset($hidDeleteId) && $hidDeleteId) {
        # DELETE
        db_delete('user', array('id' => $hidDeleteId));
    }
}
