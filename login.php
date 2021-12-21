<?php
require_once 'connect_bd.php';
require_once 'index.php';

$login_pattern = "/^[А-Яа-яЁё][А-Яа-яЁё\s-]{3,18}[А-Яа-яЁё]$/u";
$password_pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,18}$/";
$email_pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";
$phone_pattern = "/[0-9]{11}/";

if($_POST['user_password'] !== $_POST['user_password2']){
    echo "<script>alert('Пороли не совпадают')</script>";
    exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}

$conn = connect();
$sql = "INSERT INTO users(user_name,user_surname,user_email,user_phone,user_password) 
        VALUES('$_POST[user_name]','$_POST[user_surname]','$_POST[user_email]','$_POST[user_phone]','$_POST[user_password]')";
$conn->query($sql);
echo "<script>alert('Пользователь успешно зарегистрирован')</script>";
exit('<meta http-equiv="refresh" content="0; url=index.php" />');

