<?php


    require_once 'connect_bd.php';
    require_once 'index.php';

    $conn = connect();
    $sql = "select * 
    from users
    where user_email='$_POST[user_email]'
    AND user_password='$_POST[user_password]'";


    if(!$res = connect()->query($sql)){
        echo "<script>alert('Данный пользователь не найден')</script>";
        exit('<meta http-equiv="refresh" content="0; url=index.php" />');
    }

    $_SESSION['email'] = $_POST[user_email];
    $_SESSION['name'] = $_POST[user_name];
    $_SESSION['password'] = $_POST[user_password];
    $_SESSION['sesia'] = 'true';

exit('<meta http-equiv="refresh" content="0; url=index.php" />');