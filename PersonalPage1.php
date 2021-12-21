<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>FilmReview</title>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans:400,300,600' rel='stylesheet'
          type='text/css'>
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
    <script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@600&family=Fruktur&family=Heebo&family=Nunito:ital,wght@1,200&family=Oswald&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <button onclick="document.location='#main'" class="headerButton" id="mainButton">FilmReview</button>
    <button onclick="document.location='#SignIn',showSignIn()" class="headerButton" id="SignInButton">Войти</button>
    <button onclick="document.location='#LogIn',showLogIn()" class="headerButton" id="LogInButton">Зарегистрироваться</button>
</header>

<form name="Sign_in" id="SignIn"  >
    <label class="input">Вход</label>
    <input type="button" alt="" class="closeButton" value="Закрыть" onclick="closeSignIn()">
    <input type="text" name="user_login" placeholder="Логин" class="input" required>
    <input type="password" name="user_password" placeholder="Пароль" class="input" required minlength="6">
    <input type="submit" value="Войти" class="input">
    <button onclick="document.location='#LogIn',showLogIn()" class="input">Регистрация</button>
</form>

<form name="Log_in" id="LogIn" ">
    <label class="input">Регистрация</label>
    <input type="button" alt="" class="closeButton" id="CloseButtonLogIn" value="Закрыть" onclick="closeLogIn()">
    <input type="text" class="input" name="user_name" placeholder="Имя" required pattern="^[А-Яа-яЁё\s\-]+$">
    <input type="text" class="input" name="user_surname" placeholder="Фамилия" requiredpattern="^[А-Яа-яЁё\s\-]+$">
    <input type="email" class="input" name="user_email" placeholder="E-mail" pattern="^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$" required>
    <input type="tel" class="input" name="user_phone" placeholder="Телефон" pattern="^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$" required>
    <input type="password" class="input" name="user_password" placeholder="Пароль" required
           pattern="^.{5,100}[\da-z_-]*[a-z_-][\da-z_-]*$" >
    <input type="password" class="input" name="user_password2" placeholder="Повторите пароль" required
           pattern="^.{5,100}[\da-z_-]*[a-z_-][\da-z_-]*$" >
    <input type="checkbox" class="input" name="check_box" required id="checkbox">Я даю согласие на обработку персональных данных
    <input type="submit" class="input" name="login" value="Зарегистрироваться" class="input" >
    <button onclick="document.location='#SignIn',showSignIn()" class="input">Вход</button>
</form>


<main role="main">

    <div class="PersonalPost" id="PersonalPost1">
        <text class="PosterLabel">Бэтмен: Начало</text>
        <img src="pictures/Batman_Begins.png" class="PersonalPosterIMG">
        <text class="PersonalPosterTrailer">Трейлер</text>
        <iframe width="520" height="250" src="https://www.youtube.com/embed/AejoSV6gXZw" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">
                    Комментарии
                </h2>
            </div>
            <div class="col-lg-4">
                <form>
                    <div class="form-group">
                        <label for="comment-name">Name:</label>
                        <input type="text" class="form-control" id="comment-name">
                    </div>
                    <div class="form-group">
                        <label for="comment-body">Комментарий:</label>
                        <textarea type="password" class="form-control" id="comment-body" placeholder="Комментарий"></textarea>
                    </div>
                    <div class="form-group form-check text-right">
                        <button type="submit" id="comment-add" class="btn btn-primary">Добавить комментарий</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-8">
                <div id="comment-field"></div>
            </div>
        </div>
    </div>

</main>


<footer>
    <text>andreyka.neklyudov@mail.ru</text>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="scripts/js.js"></script>
</body>
</html>
