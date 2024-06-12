@extends('homepage.layout.home')
@section('content')

    <?php 
        $block_1 = getDataJson($page->fields, 'config_colums_json_home_block_1');
        // dd($block_1);
    ?>

    @if( $slideHome && $slideHome->slides )
    <!--Main Slider Start-->
    <section class="main-slider-six clearfix" id="home">
        <div class="swiper-container thm-swiper__slider"
            data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
            <div class="swiper-wrapper">
                @foreach( $slideHome->slides as $v )
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image: url({{ asset($v->src) }})"></div>
                    <?php
                    $title = preg_split("/\\r\\n|\\r|\\n/", $v->title);
                    $desc = preg_split("/\\r\\n|\\r|\\n/", $v->description);
                    ?>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="main-slider-six__content">
                                    <h2 class="main-slider-six__title">{!! implode('<br>', $title) !!}
                                    </h2>
                                    <p class="main-slider-six__text">{!! implode('<br>', $desc) !!}</p>
                                    @if( !empty($v->link) )
                                        <div class="main-slider-six__btn-box">
                                            <a href="{{ $v->link }}" class="thm-btn-three main-slider-six__btn"> Xem thêm <span class="icon-right-arrow1"></span></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- If we need navigation buttons -->
            <div class="main-slider-six__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                    <i class="icon-right-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                    <i class="icon-right-arrow1"></i>
                </div>
            </div>

        </div>
    </section>
    <!--Main Slider End-->
    @endif

    @if( $block_1 && $block_1->title && count($block_1->title) )
    <!--Feature Six Start-->
    <section class="feature-six">
        <div class="container">
            <div class="row">
                @foreach( $block_1->title as $k => $v )
                <!--Feature Six Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="feature-six__single">
                        <div class="feature-six__single-inner">
                            <div class="feature-six__shape-1">
                                <img src="{{ asset('frontend/images/feature-six-shape-2.jpg') }}" alt="{{ $block_1->title[$k] }}">
                            </div>
                            <div class="feature-six__shape-2">
                                <img src="{{ asset('frontend/images/feature-six-shape-2.jpg') }}" alt="{{ $block_1->title[$k] }}">
                            </div>
                            <div class="feature-six__icon">
                                <img src="{{ asset($block_1->image[$k]) }}" alt="{{ $block_1->title[$k] }}"/>
                            </div>
                            <h3 class="feature-six__title"><a href="{{ !empty($block_1->link[$k])?$block_1->link[$k]:'javascript:void(0)' }}">{{ $block_1->title[$k] }}</a></h3>
                            <p class="feature-six__text">{{ $block_1->desc[$k] }}</p>
                        </div>
                    </div>
                </div>
                <!--Feature Six Single End-->
                @endforeach
            </div>
        </div>
    </section>
    <!--Feature Six End-->
    @endif

    <?php
    $block2_check = getDataJson($page->fields, 'config_colums_checkbox_homepage_block_2_check');
    $block2_lef_desc = preg_split("/\\r\\n|\\r|\\n/", showField($page->fields, 'config_colums_textarea_homepage_left_desc'));
    $block2_right_title = preg_split("/\\r\\n|\\r|\\n/", showField($page->fields, 'config_colums_textarea_homepage_block_2_right_title_large'));
    $block2_right_list = preg_split("/\\r\\n|\\r|\\n/", showField($page->fields, 'config_colums_textarea_homepage_block_2_right_title_large'));
    $block2_right_thongso = getDataJson($page->fields, 'config_colums_json_homepage_block_2_thongso');
    ?>
    @if( $block2_check && $block2_check[0] == 'Hiển thị' )
    <!--About Seven Start-->
    <section class="about-seven" id="about">
        <div class="about-seven__shape-4 zoominout"></div>
        <div class="about-seven__shape-5 float-bob-y"></div>
        <div class="about-seven__shape-6 float-bob-x">
            <img src="{{ asset('frontend/images/about-seven-shape-6.png') }}" alt="{{ $fcSystem['homepage_brandname'] }}">
        </div>
        <div class="about-seven__shape-7">
            <img src="{{ asset('frontend/images/about-seven-shape-7.png') }}" alt="{{ $fcSystem['homepage_brandname'] }}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="about-seven__left">
                        <div class="about-seven__img-box wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <div class="about-seven__img">
                                <img src="{{ asset(showField($page->fields, 'config_colums_input_homepage_left_image')) }}" alt="{{ $fcSystem['homepage_brandname'] }}">
                            </div>
                            <div class="about-seven__experience">
                                <div class="about-seven__experience-count-box">
                                    <h3 class="odometer" data-count="{{ showField($page->fields, 'config_colums_input_homepage_left_number') }}">00</h3>
                                    <span class="about-seven__experience-plus">+</span>
                                </div>
                                <p class="about-seven__experience-text">{!! implode('<br>', $block2_lef_desc) !!}</p>
                                <div class="about-seven__shape-1">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/about-seven-shape-1.png"
                                        alt="">
                                </div>
                            </div>
                            <div class="about-seven__shape-2 float-bob-y">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/about-seven-shape-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="about-seven__right">
                        <div class="section-title-four text-left">
                            <span class="section-title-four__tagline">{{ showField($page->fields, 'config_colums_input_homepage_block_2_right_title_small') }}</span>
                            <h2 class="section-title-four__title">{!! implode('<br>', $block2_right_title) !!}
                            </h2>
                        </div>
                        <p class="about-seven__text">{{ showField($page->fields, 'config_colums_textarea_homepage_block_2_right_desc') }}</p>
                        <div class="about-seven__right-bottom">
                            <div class="about-seven__right-bottom-left">
                                @if( isset($block2_right_list) && is_array($block2_right_list) && count($block2_right_list) )
                                <ul class="about-seven__points list-unstyled">
                                    @foreach( $block2_right_list as $v )
                                    <li>
                                        <div class="icon">
                                            <span class="icon-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>{{ $v }}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                                
                                <div class="about-seven__contact">
                                    <div class="icon">
                                        <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/icon/about-seven-contact-icon.png"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <p>Hotline</p>
                                        <h3><a href="tel:{{ $fcSystem['contact_hotline'] }}">{{ $fcSystem['contact_hotline'] }}</a></h3>
                                    </div>
                                </div>
                                <div class="about-seven__btn-box">
                                    <a href="{{ showField($page->fields, 'config_colums_input_homepage_block_2_right_link') }}" class="about-seven__btn thm-btn-three">
                                        Xem thêm <span class="icon-right-arrow1"></span>
                                    </a>
                                </div>
                            </div>
                            @if( $block2_right_thongso && $block2_right_thongso->title )
                            <div class="about-seven__right-counter">
                                <div class="about-seven__shape-3 zoominout"></div>
                                <ul class="about-seven__right-counter-list list-unstyled">
                                    @foreach( $block2_right_thongso->title as $k => $v )
                                    <li>
                                        <div class="about-seven__count-box">
                                            <div class="about-seven__count count-box_">
                                                <h3 class="count-text" data-stop="{{ $block2_right_thongso->number[$k] }}" data-speed="1500">{{ $block2_right_thongso->number[$k] }}</h3>
                                            </div>
                                            <span class="about-seven__count-plus"></span>
                                        </div>
                                        <p>{{ $v }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Seven End-->
    @endif


    <?php 
    $block3_check = getDataJson($page->fields, 'config_colums_checkbox_homepage_block_3_check');
    $block3_slide = getDataJson($page->fields, 'config_colums_json_homepage_block_3_slide');
    ?>
    @if( $block3_check && $block3_check != null && $block3_check[0] == 'Hiển thị' )
    <!--Services six Start-->
    <section class="services-six" id="services">
        <div class="container">
            <div class="section-title-four text-center">
                <span class="section-title-four__tagline">{{ showField($page->fields, 'config_colums_input_homepage_block_3_title_small') }}</span>
                <h2 class="section-title-four__title">{{ showField($page->fields, 'config_colums_input_homepage_block_3_title_large') }}</h2>
            </div>
            @if($block3_slide && $block3_slide->image)
            <div class="services-six__bottom">
                <div class="services-six__carousel owl-carousel owl-theme thm-owl__carousel"
                    data-owl-options='{
                "loop": true,
                "autoplay": true,
                "margin": 30,
                "nav": true,
                "dots": false,
                "smartSpeed": 500,
                "autoplayTimeout": 10000,
                "navText": ["<span class=\"icon-right-arrow\"></span>","<span class=\"icon-right-arrow1\"></span>"],
                "responsive": {
                    "0": {
                        "items": 1
                    },
                    "768": {
                        "items": 2
                    },
                    "992": {
                        "items": 3
                    },
                    "1350": {
                        "items": 4
                    }
                }
            }'>
                @foreach($block3_slide->image as $k => $v)
                    <!-- Services Six Single Start-->
                    <div class="item">
                        <div class="services-six__single">
                            <div class="services-six__shape-1">
                                <img src="{{ asset('frontend/images/services-six-shape-1.png') }}" alt="{{ $block3_slide->title[$k] }}">
                            </div>
                            <div class="services-six__icon">
                                <img src="{{ asset($v) }}" alt="{{ $block3_slide->title[$k] }}" />
                                <div class="services-six__icon-shape-1"></div>
                                <div class="services-six__icon-shape-2"></div>
                            </div>
                            <h3 class="services-six__title"><a href="car-insurance.html">{{ $block3_slide->title[$k] }}</a></h3>
                            <p class="services-six__text">{{ $block3_slide->desc[$k] }}</p>
                            <div class="services-six__btn-box">
                                <a href="{{ $block3_slide->link[$k] }}" class="services-six__btn thm-btn-three">
                                    Chi tiết <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Services Six Single End-->
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    <!--Services six End-->
    @endif

    <!--Counter Three Start-->
    <section class="counter-three">
        <div class="counter-three__bg"
            style="background-image: url(http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/backgrounds/counter-three-bg.png);"></div>
        <div class="container">
            <div class="counter-three__inner">
                <ul class="counter-three__count-box list-unstyled">
                    <li>
                        <div class="counter-three__shape-1">
                            <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/counter-three-shape-1.png" alt="">
                        </div>
                        <div class="counter-three__icon">
                            <span class="icon-agreement"></span>
                        </div>
                        <div class="counter-three__count count-box">
                            <h3 class="count-text" data-stop="876" data-speed="1500">00</h3>
                        </div>
                        <p class="counter-three__text">Insurance Policies</p>
                    </li>
                    <li>
                        <div class="counter-three__shape-1">
                            <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/counter-three-shape-1.png" alt="">
                        </div>
                        <div class="counter-three__icon">
                            <span class="icon-group"></span>
                        </div>
                        <div class="counter-three__count count-box">
                            <h3 class="count-text" data-stop="223" data-speed="1500">00</h3>
                        </div>
                        <p class="counter-three__text">Happy Clients</p>
                    </li>
                    <li>
                        <div class="counter-three__shape-1">
                            <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/counter-three-shape-1.png" alt="">
                        </div>
                        <div class="counter-three__icon">
                            <span class="icon-ring"></span>
                        </div>
                        <div class="counter-three__count count-box">
                            <h3 class="count-text" data-stop="96" data-speed="1500">00</h3>
                        </div>
                        <p class="counter-three__text">Award Winning</p>
                    </li>
                    <li>
                        <div class="counter-three__shape-1">
                            <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/counter-three-shape-1.png" alt="">
                        </div>
                        <div class="counter-three__icon">
                            <span class="icon-insurance-2"></span>
                        </div>
                        <div class="counter-three__count count-box">
                            <h3 class="count-text" data-stop="786" data-speed="1500">00</h3>
                        </div>
                        <p class="counter-three__text">Skilled Contractors</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--Counter Three End-->

    <!--Testimonial Six Start-->
    <section class="testimonial-six" id="testimonials">
        <div class="container">
            <div class="section-title-four text-center">
                <span class="section-title-four__tagline">Testimonial</span>
                <h2 class="section-title-four__title">Our Lovely Customer </h2>
            </div>
            <div class="testimonial-six__bottom">
                <div class="testimonial-six__carousel owl-carousel owl-theme thm-owl__carousel"
                    data-owl-options='{
                "loop": true,
                "autoplay": true,
                "margin": 36,
                "nav": true,
                "dots": false,
                "smartSpeed": 500,
                "autoplayTimeout": 10000,
                "navText": ["<span class=\"icon-right-arrow\"></span>","<span class=\"icon-right-arrow1\"></span>"],
                "responsive": {
                    "0": {
                        "items": 1
                    },
                    "768": {
                        "items": 1
                    },
                    "992": {
                        "items": 1
                    },
                    "1350": {
                        "items": 1
                    }
                }
            }'>
                    <!--Testimonial Six Single Start-->
                    <div class="item">
                        <div class="testimonial-six__single">
                            <div class="testimonial-six__single-top">
                                <div class="testimonial-six__ratting">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <p class="testimonial-six__text">Standard dummy text ever since the unknown printer
                                    took
                                    galley of scramble make a type specimen book has the been industr</p>
                            </div>
                            <div class="testimonial-six__client-info-box">
                                <div class="testimonial-six__quote-icon">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/icon/icon-quote.png" alt="">
                                </div>
                                <div class="testimonial-six__client-img">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/testimonial/testimonial-six-img-1.jpg"
                                        alt="">
                                </div>
                                <div class="testimonial-six__client-info">
                                    <h3>Remedios Linared</h3>
                                    <p>Web designar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Six Single Start-->
                    <!--Testimonial Six Single Start-->
                    <div class="item">
                        <div class="testimonial-six__single">
                            <div class="testimonial-six__single-top">
                                <div class="testimonial-six__ratting">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <p class="testimonial-six__text">Standard dummy text ever since the unknown printer
                                    took
                                    galley of scramble make a type specimen book has the been industr</p>
                            </div>
                            <div class="testimonial-six__client-info-box">
                                <div class="testimonial-six__quote-icon">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/icon/icon-quote.png" alt="">
                                </div>
                                <div class="testimonial-six__client-img">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/testimonial/testimonial-six-img-2.jpg"
                                        alt="">
                                </div>
                                <div class="testimonial-six__client-info">
                                    <h3>Brandon Martinez</h3>
                                    <p>Product Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Six Single Start-->
                    <!--Testimonial Six Single Start-->
                    <div class="item">
                        <div class="testimonial-six__single">
                            <div class="testimonial-six__single-top">
                                <div class="testimonial-six__ratting">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <p class="testimonial-six__text">Standard dummy text ever since the unknown printer
                                    took
                                    galley of scramble make a type specimen book has the been industr</p>
                            </div>
                            <div class="testimonial-six__client-info-box">
                                <div class="testimonial-six__quote-icon">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/icon/icon-quote.png" alt="">
                                </div>
                                <div class="testimonial-six__client-img">
                                    <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/testimonial/testimonial-six-img-3.jpg"
                                        alt="">
                                </div>
                                <div class="testimonial-six__client-info">
                                    <h3>Marjorie Worley</h3>
                                    <p>Web Development</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Six Single Start-->
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial Six End-->

    <!--Team Five Start-->
    <section class="team-five" id="team">
        <div class="team-five__bg-box">
            <div class="team-five__bg"
                style="background-image: url(http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/backgrounds/team-five-bg.png);"></div>
        </div>
        <div class="container">
            <div class="section-title-four text-center">
                <span class="section-title-four__tagline">TEAM MEMBERS</span>
                <h2 class="section-title-four__title">Meet our experienced team</h2>
            </div>
            <div class="row">
                <!--Team Five Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="team-five__single">
                        <div class="team-five__single-bg-color"></div>
                        <div class="team-five__content">
                            <h3 class="team-five__name"><a href="team-details.html">Devin Booker</a></h3>
                            <p class="team-five__sub-title">DIRECTOR</p>
                        </div>
                        <div class="team-five__img-box">
                            <div class="team-five__img">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/team/team-five-img-1.jpg" alt="">
                            </div>
                            <div class="team-five__social">
                                <a href="team-details.html"><span class="fab fa-facebook-f"></span></a>
                                <a href="team-details.html"><span class="fab fa-twitter"></span></a>
                                <a href="team-details.html"><span class="fab fa-instagram"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team Five Single End-->
                <!--Team Five Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <div class="team-five__single">
                        <div class="team-five__single-bg-color"></div>
                        <div class="team-five__content">
                            <h3 class="team-five__name"><a href="team-details.html">Lorie Hutton</a></h3>
                            <p class="team-five__sub-title">MANAGER</p>
                        </div>
                        <div class="team-five__img-box">
                            <div class="team-five__img">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/team/team-five-img-2.jpg" alt="">
                            </div>
                            <div class="team-five__social">
                                <a href="team-details.html"><span class="fab fa-facebook-f"></span></a>
                                <a href="team-details.html"><span class="fab fa-twitter"></span></a>
                                <a href="team-details.html"><span class="fab fa-instagram"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team Five Single End-->
                <!--Team Five Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                    <div class="team-five__single">
                        <div class="team-five__single-bg-color"></div>
                        <div class="team-five__content">
                            <h3 class="team-five__name"><a href="team-details.html">Bob Thomas</a></h3>
                            <p class="team-five__sub-title">DESIGNER</p>
                        </div>
                        <div class="team-five__img-box">
                            <div class="team-five__img">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/team/team-five-img-3.jpg" alt="">
                            </div>
                            <div class="team-five__social">
                                <a href="team-details.html"><span class="fab fa-facebook-f"></span></a>
                                <a href="team-details.html"><span class="fab fa-twitter"></span></a>
                                <a href="team-details.html"><span class="fab fa-instagram"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team Five Single End-->
            </div>
        </div>
    </section>
    <!--Team Five End-->

    <!--Why Choose Five Start-->
    <section class="why-choose-five">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="why-choose-five__left">
                        <div class="why-choose-five__img-box wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <div class="why-choose-five__img">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/resources/why-choose-five-img-1.jpg"
                                    alt="">
                            </div>
                            <div class="why-choose-five__shape-1">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/why-choose-five-shape-1.png"
                                    alt="">
                            </div>
                            <div class="why-choose-five__shape-2">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/why-choose-five-shape-2.png"
                                    alt="">
                            </div>
                            <div class="why-choose-five__shape-3">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/why-choose-five-shape-3.png"
                                    alt="">
                            </div>
                            <div class="why-choose-five__shape-4">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/why-choose-five-shape-4.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="why-choose-five__right">
                        <div class="section-title-four text-left">
                            <span class="section-title-four__tagline">WHY YOU CHOOSE US</span>
                            <h2 class="section-title-four__title">Why you should choose our
                                insurance policy.</h2>
                        </div>
                        <ul class="why-choose-five__points-list list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-insurance"></span>
                                </div>
                                <div class="content">
                                    <h3>100% Safe Money</h3>
                                    <p>Insurance agencies can be organized either as a conventional
                                        <br> stock organization.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-cashback"></span>
                                </div>
                                <div class="content">
                                    <h3>Anytime Money Back</h3>
                                    <p>Insurance agencies can be organized either as a conventional
                                        <br> stock organization.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-profits"></span>
                                </div>
                                <div class="content">
                                    <h3>Fast Process</h3>
                                    <p>Insurance agencies can be organized either as a conventional
                                        <br> stock organization.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose Five End-->

    <!--Get Insuracne Three Start-->
    <section class="get-insuracne-three" id="contact">
        <div class="get-insuracne-three__shape-1 float-bob-y">
            <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/get-insuracne-three-shape-1.png" alt="">
        </div>
        <div class="get-insuracne-three__bg"
            style="background-image: url(http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/backgrounds/get-insuracne-three-bg.jpg);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-4">
                    <div class="get-insuracne-three__left">
                        <div class="get-insuracne-three__video-link">
                            <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                <div class="get-insuracne-three__video-icon">
                                    <span class="fa fa-play"></span>
                                    <i class="ripple"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="get-insuracne-three__right">
                        <div class="get-insuracne-three__right-bg"
                            style="background-image: url(http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/backgrounds/get-insuracne-three-right-bg.png);">
                        </div>
                        <div class="section-title-four text-left">
                            <span class="section-title-four__tagline">GET A FREE QUOTE</span>
                            <h2 class="section-title-four__title">Insurance quote</h2>
                        </div>
                        <div class="get-insuracne-three__tab clearfix">
                            <div class="get-insuracne-three__tab-box tabs-box clearfix">
                                <div class="get-insuracne-three__inner clearfix">
                                    <div class="get-insuracne-three__tab-top">
                                        <ul class="tab-buttons clearfix list-unstyled">
                                            <li data-tab="#house" class="tab-btn active-btn">
                                                <div class="get-insuracne-three__tab-btn-content">
                                                    <div class="get-insuracne-three__tab-icon">
                                                        <span class="icon-home"></span>
                                                    </div>
                                                    <div class="get-insuracne-three__tab-text-box">
                                                        <p class="get-insuracne-three__tab-text">House</p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li data-tab="#car" class="tab-btn">
                                                <div class="get-insuracne-three__tab-btn-content">
                                                    <div class="get-insuracne-three__tab-icon">
                                                        <span class="icon-drive"></span>
                                                    </div>
                                                    <div class="get-insuracne-three__tab-text-box">
                                                        <p class="get-insuracne-three__tab-text">Car</p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li data-tab="#health" class="tab-btn">
                                                <div class="get-insuracne-three__tab-btn-content">
                                                    <div class="get-insuracne-three__tab-icon">
                                                        <span class="icon-heart-beat"></span>
                                                    </div>
                                                    <div class="get-insuracne-three__tab-text-box">
                                                        <p class="get-insuracne-three__tab-text">Health</p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li data-tab="#study" class="tab-btn">
                                                <div class="get-insuracne-three__tab-btn-content">
                                                    <div class="get-insuracne-three__tab-icon">
                                                        <span class="icon-folder"></span>
                                                    </div>
                                                    <div class="get-insuracne-three__tab-text-box">
                                                        <p class="get-insuracne-three__tab-text">Study</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="get-insuracne-three__tab-bottom">
                                        <div class="tabs-content">
                                            <!--tab-->
                                            <div class="tab active-tab" id="house">
                                                <div class="get-insuracne-three__content">
                                                    <form class="get-insuracne-three__form">
                                                        <div class="get-insuracne-three__content-box">
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="text" placeholder="Full name"
                                                                    name="name">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="email" placeholder="Email address"
                                                                    name="email">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <select class="selectpicker"
                                                                    aria-label="Default select example">
                                                                    <option selected>Select type of insurance
                                                                    </option>
                                                                    <option value="1">Car insurance</option>
                                                                    <option value="2">Life insurance</option>
                                                                    <option value="3">Home insurance</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__progress">
                                                            <div class="get-insuracne-three__progress-single">
                                                                <h4 class="get-insuracne-three__progress-title">
                                                                    Client Satisfactions</h4>
                                                                <div class="bar">
                                                                    <div class="bar-inner count-bar" data-percent="78%">
                                                                        <div class="count-text">78%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__content-bottom">
                                                            <button type="submit"
                                                                class="thm-btn-three get-insuracne-three__btn">Submit
                                                                Now<span class="icon-right-arrow1"></span></button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <!--tab-->
                                            <!--tab-->
                                            <div class="tab " id="car">
                                                <div class="get-insuracne-three__content">
                                                    <form class="get-insuracne-three__form">
                                                        <div class="get-insuracne-three__content-box">
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="text" placeholder="Full name"
                                                                    name="name">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="email" placeholder="Email address"
                                                                    name="email">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <select class="selectpicker"
                                                                    aria-label="Default select example">
                                                                    <option selected>Select type of insurance
                                                                    </option>
                                                                    <option value="1">Car insurance</option>
                                                                    <option value="2">Life insurance</option>
                                                                    <option value="3">Home insurance</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__progress">
                                                            <div class="get-insuracne-three__progress-single">
                                                                <h4 class="get-insuracne-three__progress-title">
                                                                    Client Satisfactions</h4>
                                                                <div class="bar">
                                                                    <div class="bar-inner count-bar" data-percent="78%">
                                                                        <div class="count-text">78%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__content-bottom">
                                                            <button type="submit"
                                                                class="thm-btn-three get-insuracne-three__btn">Submit
                                                                Now<span class="icon-right-arrow1"></span></button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <!--tab-->
                                            <!--tab-->
                                            <div class="tab " id="health">
                                                <div class="get-insuracne-three__content">
                                                    <form class="get-insuracne-three__form">
                                                        <div class="get-insuracne-three__content-box">
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="text" placeholder="Full name"
                                                                    name="name">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="email" placeholder="Email address"
                                                                    name="email">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <select class="selectpicker"
                                                                    aria-label="Default select example">
                                                                    <option selected>Select type of insurance
                                                                    </option>
                                                                    <option value="1">Car insurance</option>
                                                                    <option value="2">Life insurance</option>
                                                                    <option value="3">Home insurance</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__progress">
                                                            <div class="get-insuracne-three__progress-single">
                                                                <h4 class="get-insuracne-three__progress-title">
                                                                    Client Satisfactions</h4>
                                                                <div class="bar">
                                                                    <div class="bar-inner count-bar" data-percent="78%">
                                                                        <div class="count-text">78%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__content-bottom">
                                                            <button type="submit"
                                                                class="thm-btn-three get-insuracne-three__btn">Submit
                                                                Now<span class="icon-right-arrow1"></span></button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <!--tab-->
                                            <!--tab-->
                                            <div class="tab " id="study">
                                                <div class="get-insuracne-three__content">
                                                    <form class="get-insuracne-three__form">
                                                        <div class="get-insuracne-three__content-box">
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="text" placeholder="Full name"
                                                                    name="name">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="email" placeholder="Email address"
                                                                    name="email">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <select class="selectpicker"
                                                                    aria-label="Default select example">
                                                                    <option selected>Select type of insurance
                                                                    </option>
                                                                    <option value="1">Car insurance</option>
                                                                    <option value="2">Life insurance</option>
                                                                    <option value="3">Home insurance</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__progress">
                                                            <div class="get-insuracne-three__progress-single">
                                                                <h4 class="get-insuracne-three__progress-title">
                                                                    Client Satisfactions</h4>
                                                                <div class="bar">
                                                                    <div class="bar-inner count-bar" data-percent="78%">
                                                                        <div class="count-text">78%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__content-bottom">
                                                            <button type="submit"
                                                                class="thm-btn-three get-insuracne-three__btn">Submit
                                                                Now<span class="icon-right-arrow1"></span></button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <!--tab-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Get Insuracne Three End-->

    @if( $homeNews && $homeNews->posts )
    <!--News Six Start-->
    <section class="news-six" id="blog">
        <div class="container">
            <div class="section-title-four text-center">
                <span class="section-title-four__tagline">News & Blog</span>
                <h2 class="section-title-four__title">Read Every Insurance Blog</h2>
            </div>
            <div class="row">
                @foreach( $homeNews->posts as $v )
                <!--News Six Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="news-six__single">
                        <div class="news-six__img-box">
                            <div class="news-six__img">
                                <img src="{{ asset(!empty($v->image)?$v->image:'images/404.png') }}" alt="{{ $v->title }}">
                            </div>
                            <div class="news-six__date">
                                <p>{{ date('d', strtotime($v->created_at)) }}</p>
                                <span>{{ getMonthName(date('m', strtotime($v->created_at))) }}</span>
                            </div>
                        </div>
                        <div class="news-six__content">
                            <div class="news-six__shape-1">
                                <img src="{{ asset('news-six-shape-1.png') }}" alt="{{ $v->title }}">
                            </div>
                            <h3 class="news-six__title"><a href="{{ route('routerURL', ['slug' => $v->slug]) }}">{{ $v->title }}</a></h3>
                            <p class="news-six__text">{{ strip_tags($v->description) }}</p>
                            <div class="news-six__btn-box">
                                <a href="{{ route('routerURL', ['slug' => $v->slug]) }}" class="news-six__btn thm-btn-three">Xem thêm<span
                                        class="icon-right-arrow1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--News Six Single End-->
                @endforeach
            </div>
        </div>
    </section>
    <!--News Six End-->
    @endif

    <!--CTA Five Start-->
    <section class="cta-five">
        <div class="cta-five__shape-1 float-bob-y"></div>
        <div class="cta-five__shape-2 float-bob-x"></div>
        <div class="container">
            <div class="cta-five__inner">
                <h3 class="cta-five__title">Subscribe our newsletter</h3>
                <div class="cta-five__subscribe-box">
                    <form class="cta-five__email-box">
                        <div class="cta-five__email-input-box">
                            <input type="email" placeholder="Email Address" name="email">
                        </div>
                        <button type="submit" class="cta-five__subscribe-btn thm-btn-three">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--CTA Five End-->
@endsection
