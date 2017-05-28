
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
                        <form method="POST" id="contact-form" class="form-horizontal" action="/index/feedback/">
                            <div class="form-group">
                                <input type="text" name="name" id="Name" class="form-control fadeInUp"
                                       placeholder="Имя" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="Email" class="form-control fadeInUp"
                                       placeholder="Email" required/>
                            </div>
                            <div class="form-group">
                                <textarea name="text" rows="20" cols="20" id="Message"
                                          class="form-control input-message fadeInUp" placeholder="Сообщение"
                                          required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Отправить"
                                       class="btn btn-success fadeInUp" id="send-feedback"/>
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
<script src="/public/js/app/create.vacancy.js"></script>
<script src="/public/js/app/feedback.js"></script>
</body>
</html>
