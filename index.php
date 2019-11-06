<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ( isset($_GET['callback']) ) {
        if ($_GET['callback'] == 'ok') {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Ваша заявка отправлена!</strong> Ожидайте от нас звонок!
            </div>
            <?php
        } elseif ($_GET['callback'] == 'fail') {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Заявка не отправлена!</strong> Введите номер телефона!
            </div>
            <?php
        }

    }
    if ( isset($_GET['room']) ) {
        require_once 'form_order.php';
        die();
    }
}

//require_once 'view.php';


require_once 'header.php';

require_once 'main.php';
require_once 'benefit.php';
require_once 'rooms.php';
require_once 'why.php';
require_once 'around.php';
require_once 'callback.php';
require_once 'comments.php';

require_once 'footer.php';

?>