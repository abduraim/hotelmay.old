<?php

if ($_POST['tel'] == '') {

	?>
	<script type="text/javascript">
		location.replace("index.php?room=<?=$_POST['room']?>&send=fail");
	</script>
	<?php
} else {

// если была нажата кнопка "Отправить"
//if(isset($_POST['submit']))
//{
	$title = 'Забронирован номер на сайте!';
//substr(htmlspecialchars(trim($_POST['name'].' '.$_POST['tell'])), 0, 1000);
	$mess = mb_substr(htmlspecialchars(trim($_POST['name'] . ' ' . $_POST['tel'])), 0, 1000, 'UTF-8');
// mb_substr(htmlspecialchars(trim($_POST['comm'])), 0, 1000000, 'UTF-8')
// $to - кому отправляем

	$mess .= '<br>' . 'Номер - ' . $_POST['room_title'] . '<br>' . 'Комментарий:' . '<br>' . $_POST['comment'];
	$to = '7406997@mail.ru';
// $from - от кого
	$from = 'info@hotelmay.ru';
// функция, которая отправляет наше письмо
	$send = mail($to, $title, $mess, 'Content-type: text/html; charset=utf-8' . "\r\n" . 'From:' . $from);

	/*if ($send == 'true')
    {
        header("Location: index.php?page=main&call_me=ok"); exit();
    }*/
	?>
	<script type="text/javascript">
		location.replace("index.php?callback=ok");
	</script>
	<?php
}

?>