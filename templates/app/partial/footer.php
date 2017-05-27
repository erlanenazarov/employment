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
