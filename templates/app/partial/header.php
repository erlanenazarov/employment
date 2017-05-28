<html>
<head>
    <!-- /.website title -->
    <title>Агентство трудоустройства</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSS Files -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="/public/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="/public/css/owl.theme.css" rel="stylesheet">
    <link href="/public/css/owl.carousel.css" rel="stylesheet">
    <link href="/public/css/jquery.ui.css" rel="stylesheet" type="text/css">

    <!-- Colors -->
    <link href="/public/css/css-index.css" rel="stylesheet" media="screen">
    <!-- <link href="css/css-index-green.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/css-index-purple.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/css-index-red.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/css-index-orange.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/css-index-yellow.css" rel="stylesheet" media="screen"> -->

    <!-- Google Fonts -->
    <link rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic"/>
    <style>
        .search select.form-control {
            height: 100%;
        }

        .search label {
            margin-bottom: 0;
        }

        .search .table-row {
            margin-top: 50px;
        }

        .vacancy-single td {
            padding-bottom: 20px;
            padding-right: 10px;
        }

        ul.bread-crumbs {
            padding-left: 0;
        }

        ul.bread-crumbs li {
            list-style: none;
            display: inline-block;
            margin-right: 15px;
            vertical-align: top;
        }

        ul.bread-crumbs li a {
            font-size: 12px;
        }

        ul.bread-crumbs li span {
            margin-left: 12px;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar-scroll">
<!-- /.preloader -->
<div id="preloader"></div>
<div id="top"></div>

<!-- /.parallax full screen background image -->
<div class="fullscreen landing parallax" style="background-image:url('/public/images/bg.png');" data-img-width="2000"
     data-img-height="1333" data-diff="100">

    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-7">

                    <!-- /.logo -->
                    <div class="logo fadeInDown">
                        <a href="/"><img src="/public/images/logo.jpg" alt="logo"></a>
                    </div>

                    <!-- /.main title -->
                    <h1 class="wow fadeInLeft">
                        Название агентства
                    </h1>

                    <!-- /.header paragraph -->
                    <div class="landing-text fadeInUp">
                        <p>Мы находим, Вы выбираете!</p>
                    </div>

                    <!-- /.header button -->
                    <div class="head-btn fadeInLeft">
                        <a href="#feature" class="btn-primary">Соискателям</a>
                        <a href="#download" class="btn-default">Работодателям</a>
                    </div>


                </div>

                <!-- /.signup form -->
                <div class="col-md-5">

                    <div class="signup-header fadeInUp">
                        <?php if(!Security::getInstance()->isAuth()): ?>
                            <h3 class="form-title text-center">ВХОД</h3>

                            <form class="form-header" action="/authentication/login"
                                  role="form" method="POST" id="login-form">
                                <input type="hidden" name="u" value="503bdae81fde8612ff4944435">
                                <input type="hidden" name="id" value="bfdba52708">

                                <div class="form-group">
                                    <input class="form-control input-lg" name="login" type="text"
                                           placeholder="Логин" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" name="password" type="password"
                                           placeholder="Пароль" required>
                                </div>
                                <div class="form-group last">
                                    <input type="submit" class="btn btn-warning btn-block btn-lg" value="Войти">
                                </div>
                                <p class="privacy text-center">У Вас нет учетной записи? <a href="#" data-toggle="modal"
                                                                                            data-target="#register-modal">
                                        Зарегистрироваться</a>.</p>
                            </form>
                        <?php else: ?>
                            <h3 class="form-title text-center">Добро пожаловать, <?php echo(Security::getInstance()->getUser()['login']); ?></h3>
                            <div class="row">
                                <div class="col-md-4"><a href="/authentication/logout" class="btn btn-primary" style="margin-top: 9px;">Выйти</a></div>
                                <div class="col-md-8">
                                    <?php if($data['need_to_fill_data']): ?>
                                        <?php if(Security::getInstance()->getUser()['role'] == 'employee') { ?>
                                            <p onclick="registerAsEmployee(null);" style="cursor: pointer;">Продолжить регистрацию как соискатель.</p>
                                        <?php } else { ?>
                                            <p onclick="registerAsEmployer(null);" style="cursor: pointer;">Продолжить регистрацию как работодатель.</p>
                                        <?php }?>
                                    <?php else: ?>
                                        <?php if(Security::getInstance()->getUser()['role'] == 'employee') { ?>
                                            <a href="/vacancy/search" class="btn btn-secondary">Найти вокансию</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-secondary" style="padding: 20px 25px;" data-toggle="modal" data-target="#create-vacancy-modal">Разместить вокансию</a>
                                        <?php }?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>