<?php
function add_header_seguridad() {
header( 'X-Content-Type-Options: nosniff' );
header( 'X-Frame-Options: SAMEORIGIN' );
header( 'X-XSS-Protection: 1;mode=block' );
ini_set('session.cookie_secure', true);
ini_set('session.cookie_httponly', true);
// ini_set('session.use_only_cookies', true);
}
?>