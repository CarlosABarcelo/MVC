<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/img/kit/free/apple-icon.png">
    <link rel="icon" href="/img/kit/free/favicon.png">
    <title><?= $titulo ?></title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/material-kit.css?v=2.0.2">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/assets-for-demo/demo.css" rel="stylesheet" />
    <!-- iframe removal -->
</head>

<body class="landing-page ">

<div class="page-header header-filter" data-parallax="true" style="height:600px; background-image: url('/img/kit/banerHome.jpg'); ">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">MVC Academia</h1>
                <h4><b>Comienza tu aprendizaje con nosotros!</b></h4>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">

        <?php $this->insert('partials/menu') ?>

        <?= $this->section('content') ?>

    </div>
</div>
<footer class="footer ">
        <div class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, 2DAW - Ingeniero de la Cierva - Carlos Alarcón Barceló
        </div>
    </div>
</footer>
<!--   Core JS Files   -->
<script src="/js/core/jquery.min.js"></script>
<script src="/js/core/popper.min.js"></script>
<script src="/js/bootstrap-material-design.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/js/plugins/nouislider.min.js"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="/js/material-kit.js?v=2.0.2"></script>
<!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
<script src="/assets-for-demo/js/material-kit-demo.js"></script>

<script>
    var url = "<?php echo URL; ?>";
</script>
</body>

</html>