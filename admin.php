<?php

$types = array('image/gif', 'image/png', 'image/jpeg');
$size = 1024000;

if ( isset($_FILES['picture']) ) {

    if (!in_array($_FILES['picture']['type'], $types)) {
        die('Запрещённый тип файла. <a href="?page=admin">Попробовать другой файл?</a>');
    }

    if ($_FILES['picture']['size'] > $size) {
        die('Слишком большой размер файла. <a href="?page=admin">Попробовать другой файл?</a>');
    }

    if ( !@move_uploaded_file($_FILES['picture']['tmp_name'], 'img/tmp/'.$_FILES['picture']['name']) ) {
        echo 'Что-то пошло не так';
    } else {
        echo 'Все ок!';
        echo $_FILES['picture']['tmp_name'];
        echo '<br>';
        echo $_FILES['picture']['name'];
    }
}

?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <?php if(!isset($_SESSION['login'])) {die();} ?>

            <h1 class="caption_title_all_n1">Панель администратора</h1>

            <div class="panel panel-primary">
                <div class="panel-heading">Материалы:</div>
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <select class="form-control" multiple>
                            <option value="" selected>Стандарт</option>
                            <option value="">Петлевой</option>
                            <option value="">Премиум</option>
                            <option value="">Классик</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="cost">Цена:</label>
                                <input type="number" class="form-control" name="cost" id="cost" value="1900">
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок:</label>
                                <input type="text" class="form-control" name="title" id="title" value="Стандарт">
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" value="standart">
                            </div>
                            <div class="form-group">
                                <label for="position">Позиция:</label>
                                <select name="position" id="position" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="picture">Изображение:</label>
                                <input type="file" class="form-control" name="picture" id="picture">
                            </div>
                            <input type="submit" class="btn btn-success btn-block" value="Сохранить">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        Изображение
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>