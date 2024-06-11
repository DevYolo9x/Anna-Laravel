<?php
$menu_footer = getMenus('menu-footer');
$gallery = getSlide('slide-footer');
?>

<!--Site Footer Four Start-->
<footer class="site-footer-four" style="display: none">
    <div class="site-footer-four__bg"
        style="background-image: url({{ asset('frontend/images/site-footer-four-bg.png') }});">
    </div>
    <div class="container">
        <div class="site-footer-four__top">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget-four__column footer-widget-four__about">
                        <div class="footer-widget-four__logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset($fcSystem['homepage_logo']) }}" alt="{{ $fcSystem['homepage_brandname'] }}">
                            </a>
                        </div>
                        <div class="footer-widget-four__about-text-box">
                            <p class="footer-widget__about-text">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna</p>
                        </div>
                        <div class="site-footer-four__social">
                            @if($fcSystem['social_facebook'])
                            <a href="{{ $fcSystem['social_facebook'] }}" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($fcSystem['social_twitter'])
                            <a href="{{ $fcSystem['social_twitter'] }}" rel="nofollow"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($fcSystem['social_youtube'])
                            <a href="{{ $fcSystem['social_youtube'] }}" rel="nofollow"><i class="fab fa-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                @if( $menu_footer && $menu_footer->menu_items && count($menu_footer->menu_items) )
                <?php $menuF = $menu_footer->menu_items->first();//dd($menuF); ?>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget-four__column footer-widget-four__services clearfix">
                        <h3 class="footer-widget-four__title">{{ $menuF->title }}</h3>
                        @if( $menuF->children )
                        <ul class="footer-widget-four__services-list list-unstyled clearfix">
                            @foreach( $menuF->children as $v )
                            <li>
                                <a href="{{ url($v->slug) }}" title={{ $v->title }}>{{ $v->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                @endif
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget-four__column footer-widget-four__contact">
                        <h3 class="footer-widget-four__title">Contact us</h3>
                        <ul class="footer-widget-four__contact-list list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-telephone-call"></span>
                                </div>
                                <div class="content">
                                    <p>Hotline:</p>
                                    <h3>
                                        <a href="tel:{{ $fcSystem['contact_hotline'] }}">{{ $fcSystem['contact_hotline'] }}</a>
                                        @if( $fcSystem['contact_hotline_1'] )
                                        <br>
                                        <a href="tel:{{ $fcSystem['contact_hotline_1'] }}">{{ $fcSystem['contact_hotline_1'] }}</a>
                                        @endif
                                    </h3>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-email"></span>
                                </div>
                                <div class="content">
                                    <p>E-mail:</p>
                                    <h3><a href="mailto:{{ $fcSystem['contact_email'] }}">{{ $fcSystem['contact_email'] }}</a></h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget-four__column footer-widget-four__news">
                        <h3 class="footer-widget-four__title">News</h3>
                        <ul class="footer-widget-four__news-list list-unstyled">
                            <li>
                                <div class="footer-widget-four__news-img">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/resources/footer-widget-four-news-img-1.jpg"
                                        alt="">
                                </div>
                                <div class="content">
                                    <h3><a href="news-details.html">The 8 best things about
                                            insurance</a></h3>
                                    <p><span class="fa fa-calendar-alt"></span>05-09-2023</p>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget-four__news-img">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/resources/footer-widget-four-news-img-2.jpg"
                                        alt="">
                                </div>
                                <div class="content">
                                    <h3><a href="news-details.html">How to make contrary
                                            to popular</a></h3>
                                    <p><span class="fa fa-calendar-alt"></span>05-09-2023</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-footer-four__bottom">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer-four__bottom-inner">
                        <p class="site-footer-four__bottom-text">© All Copyright 2023 by <a href="#">Insur.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer Four End-->


<footer class="site-footer">
    <div class="site-footer-bg" style="background-image: url({{ asset('frontend/images/site-footer-bg.png') }});">
    </div>
    <div class="container">
        <div class="site-footer__top">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset($fcSystem['homepage_logo']) }}" alt="{{ $fcSystem['homepage_brandname'] }}">
                            </a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text">Aliqua id fugiat nostrud irure ex duis ea quis
                                id quis ad et. Sunt qui esse pariatur duis deserunt.</p>
                        </div>
                        <ul class="footer-widget__contact-list list-unstyled clearfix">
                            <li>
                                <div class="icon">
                                    <span class="icon-email"></span>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:{{ $fcSystem['contact_email'] }}">{{ $fcSystem['contact_email'] }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-pin"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $fcSystem['contact_address'] }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-telephone-call"></span>
                                </div>
                                <div class="text">
                                    <p>
                                        <a href="tel:{{ $fcSystem['contact_hotline'] }}">{{ $fcSystem['contact_hotline'] }}</a>
                                        @if( !empty($fcSystem['contact_hotline_1']) )
                                         / <a href="tel:{{ $fcSystem['contact_hotline_1'] }}">{{ $fcSystem['contact_hotline_1'] }}</a>
                                        @endif
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-home"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $fcSystem['contact_website'] }}</p>
                                </div>
                            </li>
                        </ul>
                        <div class="site-footer__social">
                            @if($fcSystem['social_facebook'])
                            <a href="{{ $fcSystem['social_facebook'] }}" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($fcSystem['social_twitter'])
                            <a href="{{ $fcSystem['social_twitter'] }}" rel="nofollow"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($fcSystem['social_youtube'])
                            <a href="{{ $fcSystem['social_youtube'] }}" rel="nofollow"><i class="fab fa-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                    @if( $menu_footer && $menu_footer->menu_items && count($menu_footer->menu_items) )
                    <?php $menuF = $menu_footer->menu_items->first(); ?>
                    <div class="footer-widget__column footer-widget__contact clearfix">
                        <h3 class="footer-widget__title">{{ $menuF->title }}</h3>
                        @if( $menuF->children )
                        <ul class="footer-widget__contact-list list-unstyled clearfix">
                            @foreach( $menuF->children as $v )
                            <li>
                                <a href="{{ url($v->slug) }}" title={{ $v->title }}>{{ $v->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="footer-widget__column footer-widget__gallery clearfix">
                        <h3 class="footer-widget__title">Instagram</h3>
                        <ul class="footer-widget__gallery-list list-unstyled clearfix">
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-1.jpg" alt="">
                                    <a href="#"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-2.jpg" alt="">
                                    <a href="#"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-3.jpg" alt="">
                                    <a href="#"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-4.jpg" alt="">
                                    <a href="#"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-5.jpg" alt="">
                                    <a href="#"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-6.jpg" alt="">
                                    <a href="#"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                    <div class="footer-widget__column footer-widget__newsletter">
                        <h3 class="footer-widget__title">Liên hệ</h3>
                        <p class="footer-widget__newsletter-text">Liên hệ với chúng tôi</p>
                        <form class="footer-widget__newsletter-form">
                            <div class="footer-widget__newsletter-input-box">
                                <input type="text" placeholder="Họ và tên" name="fullname">
                                <input type="email" placeholder="Email" name="email">
                                <textarea name="message" placeholder="Nội dung..." id="" cols="30" rows="10"></textarea>
                                <button type="submit" class="footer-widget__newsletter-btn">Gửi <i class="far fa-paper-plane" style="margin:0 0 0 2px"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-footer__bottom">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© All Copyright 2023 by <a href="#">Insur.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="index.html" aria-label="logo image"><img src="assets/images/resources/logo-2.png" width="143"
                    alt=""></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:needhelp@packageName__.com">needhelp@insur.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-pinterest-p"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="{{ url('') }}">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" name="keyword" id="search" placeholder="Tìm kiếm...">
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->


<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/jarallax.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.circle-progress.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>
<script src="{{ asset('frontend/js/odometer.min.js') }}"></script>
<script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
<script src="{{ asset('frontend/js/tiny-slider.min.js') }}"></script>
<script src="{{ asset('frontend/js/wNumb.min.js') }}"></script>
<script src="{{ asset('frontend/js/wow.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/js/countdown.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/vegas.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/js/timePicker.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.circleType.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.lettering.min.js') }}"></script>
<script src="{{ asset('frontend/js/ion.rangeSlider.min.js') }}"></script>



<!-- template js -->
<script src="{{ asset('frontend/js/insur.js') }}"></script>

<!-- Javascript code -->
@push('javascript')
    <script>
        var openButton = $('.openPopup');
        var dialog = $('#dialog');
        var closeButton = $('#close');
        var overlay = $('#overlay');

        openButton.click(function() {
            dialog.toggleClass('hidden');
            overlay.toggleClass('hidden');
        })

        closeButton.click(function() {
            dialog.toggleClass('hidden');
            overlay.toggleClass('hidden');
        })

        $(document).ready(function() {
            $(".submitPopup").click(function(e) {
                e.preventDefault();
                var _token = $("#formPopup input[name='_token']").val();
                var fullname = $("#formPopup input[name='fullname']").val();
                var company = $("#formPopup input[name='company']").val();
                var tax_code = $("#formPopup input[name='tax_code']").val();
                var email = $("#formPopup input[name='email']").val();
                var phone = $("#formPopup input[name='phone']").val();
                $.ajax({
                    url: "<?php echo route('contactFrontend.popup'); ?>",
                    type: 'POST',
                    data: {
                        _token: _token,
                        fullname: fullname,
                        company: company,
                        phone: phone,
                        email: email,
                        tax_code: tax_code
                    },
                    success: function(data) {
                        if (data.status == 200) {
                            $("#formPopup .print-error-msg").css('display', 'none');
                            $("#formPopup .print-success-msg").css('display', 'block');
                            $("#formPopup .print-success-msg span").html("<?php echo $fcSystem['message_6']; ?>");
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            $("#formPopup .print-error-msg").css('display', 'block');
                            $("#formPopup .print-success-msg").css('display', 'none');
                            $("#formPopup .print-error-msg span").html(data.error);
                        }
                    }
                });
            });
        });
    </script>
@endpush
