<div class="container-fluid div_callback" id="callback">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-offset-6 col-sm-6 col-md-offset-7 col-md-4 col-lg-offset-8 col-lg-3">

                <div class="div_callback_form">
                    <form action="send_call_me.php" method="post">
                        <div class="form-group">
                            <label for="name" class="control-label">Ваше имя:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tel" class="control-label">Ваш телефон:</label>
                            <input type="tel" name="tel" id="tel" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-group-justified" value="Забронировать сейчас!" onclick="validate()">
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
