<?php

if (auth_isAnonymous()) {
    flash_set(_t('Your session is expired.'), '', 'error');
    _redirect(_cfg('baseDir') . '/login');
}

$token = _arg(2);
if ($token && $token == _app('auth')->token) {
    # Normal logout process
    auth_clear();
    flash_set(_t('You have signed out successfully.'));

    _redirect(_cfg('baseDir') . '/login');
}

_page404();
