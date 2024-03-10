<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Саранцев А.И.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container nav_bar">
        <div class = "row">
                <div class="col-3"><div class="nav_logo"></div></div>
                <div class="col-9">
                    <div class="nav_text">Информация (не) обо мне!</div>
                </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Идущий к реке</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h2><i>Не дошедший (наверное)</i></h2>
            </div>
            <div class="col-4">
                <h3><i>...а может и дошедший</i></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h4>Я в своем познании настолько преисполнился, что я как будто бы уже сто триллионов миллиардов лет
                проживаю на триллионах и триллионах таких же планет, как эта Земля, мне этот мир абсолютно понятен,
                и я здесь ищу только одного - покоя, умиротворения и вот этой гармонии, от слияния с бесконечно вечным,
                от созерцания великого фрактального подобия и от вот этого замечательного всеединства существа,
                бесконечно вечного, куда ни посмотри, хоть вглубь - бесконечно малое, хоть ввысь - бесконечное большое,
                понимаешь? А ты мне опять со своим вот этим, иди суетись дальше, это твоё распределение,
                это твой путь и твой горизонт познания и ощущения твоей природы, он несоизмеримо мелок по сравнению с моим,
                понимаешь?</h4>
            </div>
            <div class="col-4"> 
                <a href="https://www.youtube.com/watch?v=rX3W5evpeJE"></a>
                <div class="row"><div class="my_photo"></div></div>
            </a>
                <div class="row"><p class="title_photo">Саранцев А.И.</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">Нажми на меня!</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="col-12">
                <form method="POST" action="/profile.php" enctype="multipart/form-data" name="upload">
                    <div class="form_reg row"><input type ="text" class="form" name="title" placeholder="Заголовок вашего поста"></input></div>
                    <div class="form_reg row"><textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста ..."></textarea></div>
                    <input type="file" name="file" /><br>
                    <div class="btn_add"><button type="submit" class="btn_red" name="submit">Сохранить пост!</button></add>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>
</html>
<?php
require_once('db.php');
//Подключаемся к БД
$link = mysqli_connect('127.0.0.1', 'root', 'myrootpass', 'mydb');
//Проверяем наличие значений в форме
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];
    //Проверка на пустые значения
    if (!$title || !$main_text) die ('Пожалуйста введите все значения!');
    //Определим SQL запрос
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    //Проверка на ошибку
    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    }
    mysqli_close($link);
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "uploads/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}
?>