<?php
if ($_SESSION['login']!=1)
{
     include_once 'views/register_view.php';

}
    /* Initialize an array for filtered data. */
    $data = array();
    /* Hash the password. */
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    /* Allow alphanumeric usernames. */
    if (ctype_alnum($_POST['username'])) {
        $data['username'] = $_POST['username'];
    } else {
        echo 'Bad input';
        exit();
    }
    /* Store user in the database. */
    $st = $db_1->prepare('INSERT
            INTO   users (username, password)
            VALUES (?, ?)');
    $st->execute(array($data['username'], $hashed_password));
    echo 'Thank you!';
return 'views/register_view.php';


