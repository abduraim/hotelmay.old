<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LUCKYCAR24</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">


    <script src='https://www.google.com/recaptcha/api.js'></script>


    <script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="./js/scripts.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php

if ( isset($_GET['send']) ) {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Заявка не отправлена!</strong> Введите номер телефона!
    </div>
    <?php
}


switch ($_GET['room']) {
    case 'six01':
        $room_title = 'Двухместный DeLux';
        break;
    case 'six02':
        $room_title = 'Трехместный Standart';
        break;
    case 'six03':
        $room_title = 'Трехместный Classic';
        break;
    case 'seven01':
        $room_title = 'Двухместная студия';
        break;
    case 'seven02':
        $room_title = 'Студия на 2-3 человека';
        break;
    case 'seven03':
        $room_title = 'Трехместная студия';
        break;
}

?>

<div class="container-fluid">

    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">

        <h5><a href=".">на главную</a></h5>

        <h1>Забронировать номер <?=$room_title?>:</h1>

        <div class="div_form_order">
            <form action="send_order.php" method="post">
                <input type="hidden" name="room_title" value="<?=$room_title;?>">
                <input type="hidden" name="room" value="<?=$_GET['room'];?>">
                <label for="name">Ваше имя:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Ваше имя">
                <label for="tel">Ваш телефон:</label>
                <input type="tel" name="tel" id="tel" class="form-control" placeholder="Ваш телефон">
                <label for="comment">Комментарий:</label>
                <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Укажите предпологаемое время заезда-выезда и свои пожелания"></textarea>
                <div class="g-recaptcha" data-sitekey="6LeSgAcUAAAAAMk6NK8GdPH7ReLAxkaTQGagUbXq"></div>  <!-- CAPTCHA -->
                <br>
                <input type="submit" class="btn btn-success btn-lg btn-group-justified" value="Забронировать сейчас!">
            </form>
        </div>
    </div>

</div>


</body>
</html>