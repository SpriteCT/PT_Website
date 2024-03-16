<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Саранцев А.И.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Регистрация</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="/registration.php">
                    <div class="form_reg row"><input class="form" type="email" name="email" placeholder="Email"></div>
                    <div class="form_reg row"><input class="form" type="text" name="login" placeholder="Login"></div>
                    <div class="form_reg row"><input class="form" type="password" name="password" placeholder="Password"></div>
                    <button type="submit" class="btn_red btn_reg" name="submit">Продолжить</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
//Подключаемся к db.php
require_once('db.php');
if (isset($_COOKIE['User'])) {
    header("Location: login.php");
}
//Подключаемся к БД
$link = mysqli_connect('db', 'root', 'myrootpass', 'mydb');
//Проверяем наличие значений в форме
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];
    //Проверка на пустые значения
    if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');
    //Определим SQL запрос
    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
    //Проверка на ошибку
    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    }
    mysqli_close($link);
}
?>