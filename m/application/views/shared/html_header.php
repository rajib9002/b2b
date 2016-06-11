<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href="<?= base_url() ?>"/>
    <title>Bike2Biker Mobile Version</title>
    <meta name="viewport" content="width=device-width"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="<?= base_url() ?>styles/style.css" rel="stylesheet" type="text/css"/>
    <!--<script type='text/javascript' src='<?= base_url() ?>script/jquery-1.9.1.min.js'></script>-->

    <script src="script/photo/jquery-2.2.3.js" type="application/javascript"></script>
    <script src="script/photo/app.js" type="application/javascript"></script>


    <script type="text/javascript">
        var $j = jQuery.noConflict();
        var base_url = "<?= base_url() ?>";
    </script>
    <script type='text/javascript' src='<?= base_url() ?>script/script.js'></script>
    <link rel="stylesheet" href="styles/swiper.min.css">

    <?php
    $user_id = $this->session->userdata('user_id');
    $user_data = sql::row("users", "user_id='$user_id'");
    ?>

</head>