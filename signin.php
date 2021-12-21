<?php


    require_once 'connect_bd.php';
    require_once 'index.php';

    $conn = connect();
    $sql = "select * 
    from users
    where user_email='$_POST[user_email]'
    AND user_password='$_POST[user_password]'";



  

exit('<meta http-equiv="refresh" content="0; url=index.php" />');
