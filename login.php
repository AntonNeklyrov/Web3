<?php
require_once 'connect_bd.php';
require_once 'index.php';

$LOGIN_PATTERN = "/^[А-Яа-яЁё][А-Яа-яЁё\s-]{3,18}[А-Яа-яЁё]$/u";
$PASSWORD_PATTERN = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,18}$/";
$EMAIL_PATTERN = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";
$PHONE_PATTERN = "/[0-9]{11}/";

if($_POST['user_password'] !== $_POST['user_password2']){
    echo "<script>alert('Пороли не совпадают')</script>";
    exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}
if(filter_var($_POST['user_password'], $PASSWORD_PATTERN)){
    echo "<script>alert('Пароль указан неверно')</script>";
    exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}

if(filter_var($_POST['user_name'], $LOGIN_PATTERN)){
    echo "<script>alert('Имя указано неверно')</script>";
    exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}

if(filter_var($_POST['user_surname'], $LOGIN_PATTERN)){
    echo "<script>alert('Фамилия указана неверно')</script>";
    exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}

if(filter_var($_POST['user_phone'], $PHONE_PATTERN)){
    echo "<script>alert('Телефон указан неверно')</script>";
    exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}

if(filter_var($_POST['user_email'], $EMAIL_PATTERN)){
    echo "<script>alert('Емаил указан неверно')</script>";
    exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}



$conn = connect();
$sql = "INSERT INTO users(user_name,user_surname,user_email,user_phone,user_password) 
        VALUES('$_POST[user_name]','$_POST[user_surname]','$_POST[user_email]','$_POST[user_phone]','$_POST[user_password]')";
$conn->query($sql);
echo "<script>alert('Пользователь успешно зарегистрирован')</script>";
exit('<meta http-equiv="refresh" content="0; url=index.php" />');

