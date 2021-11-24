<?php
$success = false;

if (_isHttpPost()) {
    $post = _post();

    $validations = array(
        'txtFullName' => array(
            'caption'   => _t('Full Name'),
            'value'     => $post['full_name'],
            'rules'     => array('mandatory'),
        ),
        'txtUsername' => array(
            'caption'   => _t('Username'),
            'value'     => $post['username'],
            'rules'     => array('mandatory', 'username', 'unique'),
            'table'     => 'user',
            'field'     => 'username',
            'id'        => $post['id'],
        ),
        'txtEmail' => array(
            'caption'   => _t('Email'),
            'value'     => $post['email'],
            'rules'     => array('mandatory', 'email'),
        )
    );

    if (!$post['id']) {
        $validations['txtPwd'] = array(
            'caption'   => _t('Password'),
            'value'     => $post['pwd'],
            'rules'     => array('mandatory', 'minLength', 'maxLength'),
            'min'       => 8,
            'max'       => 20,
        );
        $validations['txtConfirmPwd'] = array(
            'caption'   => _t('Confirm Password'),
            'value'     => $post['confirm_pwd'],
            'rules'     => array('mandatory', 'validate_confirmPassword'),
            'parameters'=> array($post['pwd']),
            'messages'  => array(
                'validate_confirmPassword' => _t('"%s" does not match.')
            )
        );
    }

    if (form_validate($validations)) {
        if ($post['id']) {
            $data = array(
                'id'        => $post['id'],
                'full_name' => $post['full_name'],
                'username'  => $post['username'],
                'email'     => $post['email'],
                'role'      => $post['role'],
            );

            if (!empty($post['pwd'])) {
                $data['password'] = $post['pwd'];
            }

            if (db_update('user', $data)) {
                $success = true;
            }
        } else {
            $data = array(
                'full_name' => $post['full_name'],
                'username'  => $post['username'],
                'email'     => $post['email'],
                'password'  => _encrypt($post['pwd']),
                'role'      => $post['role'],
            );

            if (db_insert('user', $data)) {
                $success = true;
            }
        }

        if ($success) {
            form_set('success', true);
            form_set('redirect', _url(_cfg('baseDir') . '/user/list'));
        }
    } else {
        form_set('error', validation_get('errors'));
    }
}

form_respond('form-user');
