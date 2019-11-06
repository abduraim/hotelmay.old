<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Мини-отель "Майский"</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">


    <!-- подключение CSS файла Fancybox -->
    <link rel="stylesheet" href="fancybox/jquery.fancybox.css" type="text/css" media="screen" />

    <!-- Подключение скрипта Капчи -->
    <script src='https://www.google.com/recaptcha/api.js'></script>






    <link rel="stylesheet" href="//cdn.callbackhunter.com/widget2/tracker.css">         <!--CALLBACKHUNTER-->
    <script type="text/javascript"
            src="//cdn.callbackhunter.com/widget2/tracker.js" charset="UTF-8"></script >
    <script type="text/javascript">var hunter_code="e5514f11bf467a75d4b8742d5ecd635d";</script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <!-- Yandex.Metrika informer -->
    <!-- <a href="https://metrika.yandex.ru/stat/?id=32573670&amp;f.."
       target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/32573670/3_1_FFFF.."
                                           style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:32573670,lang:'ru'});return false}catch(e){}" /></a> -->
    <!-- /Yandex.Metrika informer -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter32573670 = new Ya.Metrika({
                        id:32573670,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true,
                        trackHash:true,
                        ecommerce:"dataLayer"
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/32573670" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->





</head>
<body>


<!-- Google -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-85693586-1', 'auto');
    ga('send', 'pageview');

</script>





<div class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#resp-menu">
            <span class="sr-only">Открыть меню</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <span class="visible-xs navbar-brand">Меню</span>
    </div>
    <div class="collapse navbar-collapse" id="resp-menu">
        <ul class="nav navbar-nav">
            <li><a href=".">Главная</a></li>
            <li><a href="#benefits">Преимущества</a></li>
            <li><a href="#rooms">Номера и цены</a></li>
            <li><a href="#why">Наши отличия</a></li>
            <li><a href="#around">Что рядом</a></li>
            <li><a href="#callback">Забронировать</a></li>
            <li><a href="#comments">Отзывы</a></li>
        </ul>
    </div>
</div>



<div class="modal fade" id="order_room">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" id="myModalLabel">Забронировать номер</h4>
            </div>
            <div class="modal-body">
                <form action="send_order.php" method="post">
                    <input type="hidden" name="room_title" value="<?=$room_title;?>">
                    <input type="hidden" name="room" value="<?=$_GET['room'];?>">
                    <label for="name">Ваше имя:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ваше имя">
                    <label for="tel">Ваш телефон:</label>
                    <input type="tel" name="tel" id="tel" class="form-control" placeholder="Ваш телефон">
                    <label for="comment">Комментарий:</label>
                    <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Укажите предпологаемое время заезда-выезда и свои пожелания"></textarea>
                    <p id="content"></p>
                    <div class="g-recaptcha" data-sitekey="6LeSgAcUAAAAAMk6NK8GdPH7ReLAxkaTQGagUbXq"></div>  <!-- CAPTCHA -->
                    <br>
                    <input type="submit" class="btn btn-success btn-lg btn-group-justified" value="Забронировать сейчас!">
                </form>
            </div>
        </div>
    </div>
</div>