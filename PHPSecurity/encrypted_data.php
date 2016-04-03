<?php

$algorithm = MCRYPT_BLOWFISH;
$key = 'PHP is a server-side scripting language.';
$data = "PHP 7 introduces significant performance improvements that will improve your users' wait time";
$mode = MCRYPT_MODE_CBC;
$iv = mcrypt_create_iv(mcrypt_get_iv_size($algorithm, $mode), MCRYPT_DEV_URANDOM);
$encrypted_data = mcrypt_encrypt($algorithm, $key, $data, $mode, $iv);
$plain_text = base64_encode($encrypted_data);
echo $plain_text . "\n";

$encrypted_data = base64_decode($plain_text);
$decoded = mcrypt_decrypt($algorithm, $key, $encrypted_data, $mode, $iv);
echo trim($decoded) . "\n";

