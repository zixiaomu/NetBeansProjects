<?php
// Start session management with a persistent cookie
$duration = 60 * 60 * 24 * 7;    // 1 weeks in seconds
//$duration = 0;                // per-session cookie
session_set_cookie_params($duration, '/');
session_start();

echo 'Before: '.session_id().'<br>';
session_regenerate_id();
echo 'After: '.session_id().'<br>';
$_SESSION['logged_in'] = true;

