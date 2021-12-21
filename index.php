<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>FilmReview</title>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans:400,300,600' rel='stylesheet'
          type='text/css'>
    <script src="scripts/js.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&family=Oswald&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&family=Nunito:ital,wght@1,200&family=Oswald&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fruktur&family=Heebo&family=Nunito:ital,wght@1,200&family=Oswald&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fruktur&family=Heebo&family=Nunito:ital,wght@1,200&family=Oswald&family=PT+Sans+Narrow&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@600&family=Fruktur&family=Heebo&family=Nunito:ital,wght@1,200&family=Oswald&family=PT+Sans+Narrow&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@600&family=Fruktur&family=Heebo&family=Nunito:ital,wght@1,200&family=Oswald&family=PT+Sans+Narrow&display=swap"
          rel="stylesheet">
    <script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>
    <script src="scripts/ajax.php"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="signin.php"></script>
</head>
<body>



<header>
    <button class="headerButton" id="mainButton">FilmReview</button>
    <button onclick="document.location='#SignIn',showSignIn()" class="headerButton" id="SignInButton">Войти</button>
    <button onclick="document.location='#LogIn',showLogIn()" class="headerButton" id="LogInButton">Зарегистрироваться</button>
</header>







<form name="Sign_in" id="SignIn" action="signin.php" method="post">
    <label class="input">Вход</label>
    <input type="button" alt="" class="closeButton" value="Закрыть" onclick="closeSignIn()">
    <input type="text" name="user_login" placeholder="Email" class="input" required>
    <input type="password" name="user_password_SignIn" placeholder="Пароль" class="input" required minlength="6">
    <input type="submit" value="Войти" class="input">
    <button onclick="document.location='#LogIn',showLogIn()" class="input">Регистрация</button>
</form>

<form name="Log_in" id="LogIn" action="login.php" method="post">
    <label class="input">Регистрация</label>
    <input type="button" alt="" class="closeButton" id="CloseButtonLogIn" value="Закрыть" onclick="closeLogIn()">
    <input type="text" class="input" name="user_name" placeholder="Имя" required pattern="^[А-Яа-яЁё\s\-]+$">
    <input type="text" class="input" name="user_surname" placeholder="Фамилия" requiredpattern="^[А-Яа-яЁё\s\-]+$">
    <input type="email" class="input" name="user_email" placeholder="E-mail"
           pattern="^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$"
           required>
    <input type="tel" class="input" name="user_phone" placeholder="Телефон"
           pattern="^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$" required>
    <input type="password" class="input" name="user_password" placeholder="Пароль" required
           pattern="^.{5,100}[\da-z_-]*[a-z_-][\da-z_-]*$">
    <input type="password" class="input" name="user_password2" placeholder="Повторите пароль" required
           pattern="^.{5,100}[\da-z_-]*[a-z_-][\da-z_-]*$">
    <input type="checkbox" class="input" name="check_box" required id="checkbox">Я даю согласие на обработку
    персональных данных
    <input type="submit" class="input" name="login" value="Зарегистрироваться" class="input">
    <button onclick="document.location='#SignIn',showSignIn()" class="input">Вход</button>
</form>


<main role="main">

    <?php
    require_once 'connect_bd.php';
    $dbh = connect();
    $sth = $dbh->prepare("SELECT * FROM post LIMIT 2");
    $sth->execute();
    $items = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = $dbh->prepare("SELECT COUNT('post_id') FROM post");
    $sth->execute();
    $total = $sth->fetch(PDO::FETCH_COLUMN);
    $amt = ceil($total / 2);
    ?>


    <?php foreach ($items as $row): ?>
        <div class="Post" id="Post<?php echo $row['post_id']; ?>">
            <text class="PosterLabel"><?php echo $row['post_label']; ?></text>
            <img src="<?php echo $row['post_img']; ?>" class="PosterIMG" alt="">
            <data class="PosterData" value=""><?php echo $row['post_data']; ?></data>
            <input type="button" value="Перейти" class="PosterButton">
        </div>
    <?php endforeach; ?>


    <?php
    $dbh = connect();

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $size_page = 2;
    $start = ($pageno - 1) * $size_page;

    $count_sql = "SELECT COUNT(*) FROM post";
    $result = $dbh->prepare($count_sql);
    $result->execute();
    $total_rows = $result->fetch(PDO::FETCH_COLUMN);
    $total_pages = ceil($total_rows / $size_page);

    $res_data = $dbh->prepare("SELECT * FROM post LIMIT {$start} OFFSET {$size_page}");
    $res_data->execute();
    $items = $res_data->fetchAll(PDO::FETCH_ASSOC);

    foreach ($items as $row) {
        ?>
        <div class="Post" id="Post<?php echo $row['post_id']; ?>">
            <text class="PosterLabel"><?php echo $row['post_label']; ?></text>
            <img src="<?php echo $row['post_img']; ?>" class="PosterIMG" alt="">
            <data class="PosterData" value=""><?php echo $row['post_data']; ?></data>
            <input type="button" value="Перейти" class="PosterButton">
        </div>
        <?php
    }
    ?>

    <ul class="pagination">
        <button type='button' class="btn btn-primary" id="load_more_btn">
        <a  id="load_more" href="<?php if ($pageno >= $total_pages) {
            echo '#';
        } else {
            echo "?pageno=" . ($pageno + 1);
        } ?>"">Показать еще</a>
            <script>
                var link = document.querySelector("#load_more_btn > a");
                console.log(link);
                var atr = link.getAttribute('href');
                var str = atr.slice(-1)
                if(str === '#'){
                    document.getElementById('load_more_btn').style.display = 'none';
                }
            </script>
        </button>
    </ul>


</main>


<footer>
    <text>andreyka.neklyudov@mail.ru</text>
</footer>
</body>

<script>

</script>

</html>
