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
                        <a href=""><img src="/public/images/logo.jpg" alt="logo"></a>
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
                                            <a href="#" class="btn btn-secondary">Найти вокансию</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-secondary" style="padding: 20px 25px;">Разместить вокансию</a>
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

<!-- NAVIGATION -->
<div id="menu">
    <nav class="navbar-wrapper navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-backyard">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand site-name" href="#top"><img src="/public/images/logo2.jpg" alt="logo"></a>
            </div>

            <div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="#intro">Поиск вакансий</a></li>
                    <li><a href="#feature">Каталог вакансий</a></li>
                    <li><a href="#download">Разместить вакансию</a></li>
                    <li><a href="#package">Советы</a></li>
                    <li><a href="#testi">Стажировки</a></li>
                    <li><a href="#contact">Обратная связь</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div id="intro">
    <div class="container">
        <div class="row">

            <!-- /.intro image -->
            <div class="col-md-6 intro-pic slideInLeft">
                <img src="/public/images/intro-image.jpg" alt="image" class="img-responsive">
            </div>

            <!-- /.intro content -->
            <div class="col-md-6 slideInRight">
                <h2>Есть зарплата - есть работа!</h2>

                <p>Вакансии радом с домом от проверенных работодателей.
                </p>

                <div class="btn-section"><a href="poick_vac.html" class="btn-default">Найти</a></div>

            </div>
        </div>
    </div>
</div>


<!-- /.feature section -->
<div id="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center feature-title">

                <!-- /.feature title -->
                <h2>Все вакансии портала по профессиональным сферам:</h2>
            </div>
        </div>
        <div class="row row-feat">
            <div class="col-md-2 text-center">

                <!-- /.feature image -->

            </div>

            <div class="col-md-8">

                <!-- /.feature 1 -->
                <div class="col-sm-6 feat-list">
                    <i class="pe-7s-notebook pe-5x pe-va fadeInUp"></i>

                    <div class="inner">
                        <h4>Финансы / Страхование</h4>
                        <a href="banki.html">Банки / Инвестиции / Ценные бумаги</a>
                        <a href="byxg.html">Бухгалтерия / Аудит / Экономика предприятия</a><br>
                        <a href="strax.html">Страхование</a>
                    </div>
                </div>


                <!-- /.feature 2 -->
                <div class="col-sm-6 feat-list">
                    <i class="pe-7s-wallet fadeInUp" data-wow-delay="0.2s"></i>

                    <div class="inner">
                        <h4>Офисные службы / Бизнес-услуги</h4>
                        <a href="hr.html">HR / Кадры / Подбор персонала</a>
                        <a href="administr.html">Административный персонал</a>
                        <a href="konsal.html">Консалтинг / Тренинги</a>
                        <a href="oxrana.html">Охрана / Безопасность</a>
                        <a href="urist.html">Юриспруденция </a>
                    </div>
                </div>

                <!-- /.feature 3 -->
                <div class="col-sm-6 feat-list">
                    <i class="pe-7s-study fadeInUp" data-wow-delay="0.4s"></i>

                    <div class="inner">
                        <h4>Культура / Образование / Госслужба</h4>
                        <a href="gos.html">Госслужба / Некоммерческие организации</a><br>
                        <a href="kultura.html">Культура / Искусство / Развлечения</a><br>
                        <a href="obrazov.html">Образование / Наука </a>
                    </div>
                </div>

                <div class="col-sm-6 feat-list">
                    <i class="pe-7s-paint fadeInUp" data-wow-delay="0.4s"></i>

                    <div class="inner">
                        <h4>Строительство / Недвижимость</h4>
                        <a href="gos.html">Недвижимость / Риелторские услуги</a><br>
                        <a href="kultura.html">Строительство / ЖКХ / Эксплуатация</a><br>
                    </div>
                </div>

                <!-- /.feature 4 -->
                <div class="col-sm-6 feat-list">
                    <i class="pe-7s-users pe-5x pe-va fadeInUp" data-wow-delay="0.6s"></i>

                    <div class="inner">
                        <h4>Красота / Здоровье</h4>
                        <a href="kracota.html">Красота / Фитнес / Спорт</a><br>
                        <a href="medik.html">Медицина / Фармация / Ветеринария</a>
                    </div>
                </div>

                <!-- /.feature 4 -->
                <div class="col-sm-6 feat-list">
                    <i class="pe-7s-culture fadeInUp" data-wow-delay="0.2s"></i>

                    <div class="inner">
                        <h4>Сфера услуг</h4>
                        <a href="hr.html">Бытовые услуги / Обслуживание оборудования</a> <br>
                        <a href="administr.html">Домашний персонал</a><br>
                        <a href="konsal.html">Рестораны / Питание</a><br>
                        <a href="oxrana.html">Туризм / Гостиницы</a><br>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- /.feature 2 section -->


<!-- /.download section -->
<div id="download">
    <div class="action fullscreen parallax" style="background-image:url('/public/images/bg2.jpg');"
         data-img-width="2000"
         data-img-height="1333" data-diff="100">
        <div class="overlay">
            <div class="container">
                <div class="col-md-8 col-md-offset-2 col-sm-12 text-center">

                    <!-- /.download title -->
                    <h2 class="wow fadeInRight">Есть свободная вакансия?</h2>

                    <p class="download-text fadeInLeft">
                        тексттексттексттексттексттекттккексттексттексттексттексттексттексттексттекст.</p>

                    <!-- /.download button -->
                    <div class="download-cta fadeInLeft">
                        <a href="vacancy.html" class="btn-secondary">Разместить вакансию</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.pricing section -->
<div id="package">
    <div class="container">
        <div class="text-center">

            <!-- /.pricing title -->
            <h2 class="wow fadeInLeft">Работа и карьера</h2>

            <div class="title-line fadeInRight"></div>
        </div>
        <div class="row package-option">

            <!-- /.package 1 -->
            <div class="col-sm-3">
                <div class="price-box fadeInUp">
                    <div class="price-heading text-center">
                        <!-- /.package icon -->
                        <i class="pe-7s-wallet"></i>

                        <!-- /.package name -->
                        <h3>Медицинская книжка за счет работника?</h3>
                    </div>


                    <!-- /.package features -->
                    <ul class="price-feature text-center">
                        <p>Медицинская книжка необходима людям, работающим с продуктами питания и некоторыми другими
                            товарами (одежда, игрушки, косметика), работникам пассажирского транспорта и образовательных
                            учреждений.</p>
                    </ul>

                    <!-- /.package button -->
                    <div class="price-footer text-center">
                        <a class="btn btn-price" href="med_kniga.html">Читать далее</a>
                    </div>
                </div>
            </div>

            <!-- /.package 2 -->
            <div class="col-sm-3">
                <div class="price-box fadeInUp" data-wow-delay="0.2s">
                    <div class="price-heading text-center">

                        <!-- /.package icon -->
                        <i class="pe-7s-portfolio"></i>

                        <!-- /.package name -->
                        <h3>Работа — когда можешь, зарплата — когда хочешь!</h3>
                    </div>

                    <!-- /.price -->
                    <div class="price-group text-center">
                        <p>Реально ли найти работу по графику, который вы будете составлять сами? С выплатами зарплаты
                            не раз в месяц, а дважды в неделю? В шаговой доступности от дома? С реальными перспективами
                            карьерного роста?</p>
                    </div>


                    <!-- /.package button -->
                    <div class="price-footer text-center">
                        <a class="btn btn-price" href="rabota.html">Читать далее</a>
                    </div>
                </div>
            </div>

            <!-- /.package 3 -->
            <div class="col-sm-3">
                <div class="price-box fadeInUp" data-wow-delay="0.4s">
                    <div class="price-heading text-center">

                        <!-- /.package icon -->
                        <i class="pe-7s-bicycle"></i>

                        <!-- /.package name -->
                        <h3>Карлсон спешит на работу</h3>
                    </div>
                    <div class="price-group text-center">
                        <p>Сегодня мы расскажем о новых средствах передвижения — от чрезвычайно практичных до самых
                            невероятных, чтобы быстро добраться до работы летом, минуя многокилометровые пробки и душное
                            метро!</p>
                    </div>


                    <!-- /.package button -->
                    <div class="price-footer text-center">
                        <a class="btn btn-price" href="#">Читать далее</a>
                    </div>
                </div>
            </div>

            <!-- /.package 4 -->
            <div class="col-sm-3">
                <div class="price-box fadeInUp" data-wow-delay="0.6s">
                    <div class="price-heading text-center">

                        <!-- /.package icon -->
                        <i class="pe-7s-study"></i>

                        <!-- /.package name -->
                        <h3>Бесплатный сыр в стажировке</h3>
                    </div>

                    <!-- /.price -->
                    <div class="price-group text-center">
                        <p>Для многих молодых специалистов стажировка может стать первым серьезным шагом на пути к
                            блестящей карьере. Однако стажеров нередко используют как дешевую рабочую силу или не
                            оплачивают их труд.</p>
                    </div>

                    <!-- /.package features -->

                    <!-- /.package button -->
                    <div class="price-footer text-center">
                        <a class="btn btn-price" href="#">Читать далее</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- /.client section -->
<div id="client">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <img alt="client" src="/public/images/client1.png" class="wow fadeInUp">

                <p> fghjhlkjl</p>
                <img alt="client" src="/public/images/client2.PNG" class="wow fadeInUp" data-wow-delay="0.2s">

            </div>
        </div>
    </div>
</div>

<!-- /.testimonial section -->
<div id="testi">
    <div class="container">
        <div class="text-center">
            <h2 class="wow fadeInLeft">Делайте первые шаги по карьерной лестнице еще в вузе</h2>

            <div class="title-line fadeInRight"></div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div id="owl-testi" class="owl-carousel owl-theme fadeInUp">

                    <!-- /.testimonial 1 -->
                    <div class="testi-item">
                        <div class="client-pic text-center">

                            <!-- /.client photo -->
                            <img src="/public/images/testi1.png" alt="client">
                        </div>
                        <div class="box">

                            <!-- /.testimonial content -->
                            <p class="message text-center">Мы предлагаем стажировки в таких компаниях, как Intel,
                                L'Oreal, BNP Paribas, «Аэрофлот» и других.</p>
                        </div>

                    </div>

                    <!-- /.testimonial 2 -->
                    <div class="testi-item">
                        <div class="client-pic text-center">

                            <!-- /.client photo -->
                            <img src="/public/images/testi2.jpg" alt="client">
                        </div>
                        <div class="box">

                            <!-- /.testimonial content -->
                            <p class="message text-center">Молодые специалисты могут найти работу без требований к опыту
                                и совмещать ее с учебой.</p>
                        </div>

                    </div>

                    <!-- /.testimonial 3 -->
                    <div class="testi-item">
                        <div class="client-pic text-center">

                            <!-- /.client photo -->
                            <img src="/public/images/testi3.jpg" alt="client">
                        </div>
                        <div class="box">

                            <!-- /.testimonial content -->
                            <p class="message text-center">В разделе «Работа для студентов» есть вакансии из разных
                                профессиональных сфер с гибким графиком, с частичной занятостью или на полный рабочий
                                день.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.contact section -->
<div id="contact">
    <div class="contact fullscreen parallax" style="background-image:url('/public/images/bg.png');"
         data-img-width="2000"
         data-img-height="1334" data-diff="100">
        <div class="overlay">
            <div class="container">
                <div class="row contact-row">

                    <!-- /.address and contact -->
                    <div class="col-sm-5 contact-left fadeInUp">
                        <h2><span class="highlight">Связаться</span> с нами</h2>
                        <ul class="ul-address">
                            <li><i class="pe-7s-map-marker"></i>г.Чита, ул.Баргузинская д.49 офис 305

                            </li>
                            <li><i class="pe-7s-phone"></i>+7 (123) 456-7890</br>
                                +7 (098) 765-4321
                            </li>
                            <li><i class="pe-7s-mail"></i><a href="mailto:innessadis@mail.ru">innessadis@mail.ru</a>
                            </li>
                            <li><i class="pe-7s-look"></i><a href="#">www.yoursite.com</a></li>
                        </ul>

                    </div>

                    <!-- /.contact form -->
                    <div class="col-sm-7 contact-right">
                        <form method="POST" id="contact-form" class="form-horizontal" action="contactengine.php"
                              onSubmit="alert( 'Thank you for your feedback!' );">
                            <div class="form-group">
                                <input type="text" name="Name" id="Name" class="form-control fadeInUp"
                                       placeholder="Имя" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Email" id="Email" class="form-control fadeInUp"
                                       placeholder="Email" required/>
                            </div>
                            <div class="form-group">
                                <textarea name="Message" rows="20" cols="20" id="Message"
                                          class="form-control input-message fadeInUp" placeholder="Сообщение"
                                          required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Отправить"
                                       class="btn btn-success fadeInUp"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.footer -->
<footer id="footer">
    <div class="container">
        <div class="col-sm-4 col-sm-offset-4">
            <!-- /.social links -->
            <div class="social text-center">
                <ul>
                    <li><a class="wow fadeInUp" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="wow fadeInUp" href="https://www.facebook.com/" data-wow-delay="0.2s"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a class="wow fadeInUp" href="https://plus.google.com/" data-wow-delay="0.4s"><i
                                class="fa fa-google-plus"></i></a></li>
                    <li><a class="wow fadeInUp" href="https://instagram.com/" data-wow-delay="0.6s"><i
                                class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="text-center fadeInUp" style="font-size: 14px;">Агентство трудоустройства <br> 2017</div>
            <a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
        </div>
    </div>
</footer>


<?php include(PROJECT_PATH.'/templates/app/partial/modals.php'); ?>


<!-- /.javascript files -->
<script src="/public/js/jquery.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/custom.js"></script>
<script src="/public/js/jquery.sticky.js"></script>
<script src="/public/js/wow.min.js"></script>
<script src="/public/js/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function (e) {
        $('#register-birthday').datepicker({
            'dateFormat': 'yy-mm-dd',
            'changeMonth': true,
            'changeYear': true,
            'yearRange': "1900:2017"
        });
    });
</script>
<script>

    $(document).ready(function () {
        var wow = new WOW();
        wow.init();
    });
</script>
<script src="/public/js/app/login.js"></script>
<script src="/public/js/app/register.js"></script>
</body>
</html>
