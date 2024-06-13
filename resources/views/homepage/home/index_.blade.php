@extends('homepage.layout.home')
@section('content')

    <?php 
        $block_1 = getDataJson($page->fields, 'config_colums_json_home_block_1');
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

    <!-- @if( $homeProduct )
    <section class="product-home" style="display: none;">
        <div class="container">
            <div class="nav-top">
                <div class="nav-tab text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach( $homeProduct as $k => $v )
                    <a class="nav-link mb-3 p-3 shadow @if($k==0) active @endif" data-toggle="pill" href="#v-pills-{{ $v->slug }}" role="tab" aria-controls="v-pills-{{ $v->slug }}" aria-selected="true">
                        <i class="fa fa-user-circle-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">{{ $v->title }}</span>
                    </a>
                    @endforeach
                </div>

                <div class="tab-content" id="v-pills-tabContent">
                    @foreach( $homeProduct as $k => $v )
                    <div class="tab-pane fade @if($k==0) show active @endif" id="v-pills-{{ $v->slug }}" role="tabpanel" aria-labelledby="v-pills-{{ $v->slug }}">
                        <div class="tab-home-product">
                            <div class="tab-item" id="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="left-box">
                                            <img src="{{ asset(!empty($v->image)?$v->image:'images/404.png') }}" alt="{{ $v->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="right-box">
                                            <div class="content">
                                                <h3><a href="{{ route('routerURL', ['slug' => $v->slug]) }}" title="{{ $v->title }}">{{ $v->title }}</a></h3>
                                                <div class="description">
                                                    {!! $v->description !!}
                                                </div>
                                                <a class="readmore btn btn-3 hover-border-1" href="{{ route('routerURL', ['slug' => $v->slug]) }}">
                                                    <span>
                                                        Xem thêm <i class="fas fa-angle-double-right"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif -->

    @if( $homeProduct && count($homeProduct) && $homeProduct->countProduct && count($homeProduct->countProduct) )
    <?php $chuckHomeProduct = array_chunk($homeProduct->countProduct->toArray(), 6); ?>
    <section class="product-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="title-box">{{ $homeProduct->title }}</h3>
                    <div class="desc">
                        {!! $homeProduct->description !!}
                    </div>
                    <div class="card-box tab-home-product">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="left-box">
                                    <img src="https://anavn.com.vn/UploadData/files/phan-mem-hanh-chinh-9_0.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="right-box render-product">
                                    <div class="content">
                                        <h3 class="title"><a href="" title="">PHẦN MỀM QUẢN LÝ THU HỌC PHÍ</a></h3>
                                        <div class="description">
                                            <p>
                                                A-ANA 7.0 là công cụ hỗ trợ đắc lực cho các đơn vị Hành chính sự nghiệp thực hiện các công việc hạch toán kế toán. 
                                                Phù hợp cho các đơn vị Hành chính sự nghiệp và Hành chính sự nghiệp có thu. A-ANA 7.0 sử dụng giao diện hoàn toàn bằng tiếng Việt, 
                                                giúp cho người sử dụng dễ học, dễ nhớ, dễ sử dụng. 
                                                Chỉ sau vài tiếng đồng hồ thao tác, người sử dụng đã có thể nắm vững và khai thác có hiệu quả phần mềm trong vào công việc của mình.
                                            </p>
                                        </div>
                                        <a class="readmore btn btn-3 hover-border-1" href="">
                                            <span>
                                                Xem thêm <i class="fas fa-angle-double-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if( isset($chuckHomeProduct) && is_array($chuckHomeProduct) && count($chuckHomeProduct) )
                        <div class="slider-home-product custom-nav owl-carousel owl-theme">
                            @foreach( $chuckHomeProduct as $k => $v )
                                <div class="list-products">
                                    <div class="row">
                                        @foreach( $v as $kC => $vC )
                                        <div class="col-lg-4">
                                            <div class="item">
                                                <a href="javascript:void(0)" class="showProduct" data-json="{{ base64_encode(json_encode($vC)) }}">
                                                    <img src="{{ $vC['image'] }}" alt="{{ $vC['title'] }}">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
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

    <?php 
    $block4_check = getDataJson($page->fields, 'config_colums_checkbox_homepage_block_4_check');
    $block4_slide = getDataJson($page->fields, 'config_colums_json_homepage_block_4_thongtin');
    ?>
    @if( $block4_check && $block4_check != null && $block4_check[0] == 'Hiển thị' )
    <!--Counter Three Start-->
    <section class="counter-three">
        <div class="counter-three__bg"
            style="background-image: url({{ asset('frontend/images/counter-three-bg.png') }});"></div>
        <div class="container">
            <div class="counter-three__inner">
                @if( $block4_slide->image )
                <ul class="counter-three__count-box list-unstyled">
                    @foreach( $block4_slide->image as $k => $v )
                    <li>
                        <div class="counter-three__shape-1">
                            <img src="{{ asset('frontend/images/counter-three-shape-1.png') }}" alt="{{ $block4_slide->title[$k] }}">
                        </div>
                        <div class="counter-three__icon">
                            <img src="{{ asset($v) }}" alt="{{ $block4_slide->title[$k] }}">
                        </div>
                        <div class="counter-three__count count-box">
                            <h3 class="count-text" data-stop="{{ $block4_slide->number[$k] }}" data-speed="1500">00</h3>
                        </div>
                        <p class="counter-three__text">{{ $block4_slide->title[$k] }}</p>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </section>
    <!--Counter Three End-->
    @endif

    <?php 
    $block5_check = getDataJson($page->fields, 'config_colums_checkbox_homepage_block_5_check');
    $block5_slide = getDataJson($page->fields, 'config_colums_json_homepage_block_5_slide');
    ?>
    @if( $block5_check && $block5_check != null && $block5_check[0] == 'Hiển thị' )
    <!--Testimonial Six Start-->
    <section class="testimonial-six" id="testimonials">
        <div class="container">
            <div class="section-title-four text-center">
                <span class="section-title-four__tagline">{{ showField($page->fields, 'config_colums_input_homepage_block_5_title_nho') }}</span>
                <h2 class="section-title-four__title">{{ showField($page->fields, 'config_colums_input_homepage_block_5_title_lon') }}</h2>
            </div>
            @if( $block5_slide && $block5_slide->image )
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
                    @foreach( $block5_slide->image as $k => $v )
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
                                <p class="testimonial-six__text">{{ $block5_slide->desc[$k] }}</p>
                            </div>
                            <div class="testimonial-six__client-info-box">
                                <div class="testimonial-six__quote-icon">
                                    <img src="{{ asset('frontend/images/icon-quote.png') }}" alt="{{ $block5_slide->title[$k] }}">
                                </div>
                                <div class="testimonial-six__client-img">
                                    <img src="{{ asset($v) }}" alt="{{ $block5_slide->title[$k] }}">
                                </div>
                                <div class="testimonial-six__client-info">
                                    <h3>{{ $block5_slide->title[$k] }}</h3>
                                    <p>{{ $block5_slide->about[$k] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Six Single Start-->
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--Testimonial Six End-->
    @endif

    <?php 
    $block6_check = getDataJson($page->fields, 'config_colums_checkbox_homepage_block_6_check');
    $block6_slide = getDataJson($page->fields, 'config_colums_json_homepage_block_6_thongtin');
    ?>
    @if( $block6_check && $block6_check != null && $block6_check[0] == 'Hiển thị' )
    <!--Team Five Start-->
    <section class="team-five" id="team">
        <div class="team-five__bg-box">
            <div class="team-five__bg"
                style="background-image: url({{ asset('frontend/images/team-five-bg.png') }});"></div>
        </div>
        <div class="container">
            <div class="section-title-four text-center">
                <span class="section-title-four__tagline">{{ showField($page->fields, 'config_colums_input_homepage_block_6_title_nho') }}</span>
                <h2 class="section-title-four__title">{{ showField($page->fields, 'config_colums_input_homepage_block_6_title_lon') }}</h2>
            </div>
            @if( $block6_slide && $block6_slide->image )
            <div class="row">
                @foreach( $block6_slide->image as $k => $v )
                <!--Team Five Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="team-five__single">
                        <div class="team-five__single-bg-color"></div>
                        <div class="team-five__content">
                            <h3 class="team-five__name"><a href="javascript:void(0)">{{ $block6_slide->title[$k] }}</a></h3>
                            <p class="team-five__sub-title">{{ $block6_slide->desc[$k] }}</p>
                        </div>
                        <div class="team-five__img-box">
                            <div class="team-five__img">
                                <img src="{{ asset($v) }}" alt="{{ $block6_slide->title[$k] }}">
                            </div>
                            <div class="team-five__social">
                                @if( !empty($block6_slide->facebook[$k]) )
                                    <a href="{{ $block6_slide->facebook[$k] }}"><span class="fab fa-facebook-f"></span></a>
                                @endif
                                @if( !empty($block6_slide->hotline[$k]) )
                                    <a href="tel:{{ $block6_slide->hotline[$k] }}"><span class="fas fa-phone"></span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team Five Single End-->
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <!--Team Five End-->
    @endif

    <?php 
    $block7_check = getDataJson($page->fields, 'config_colums_checkbox_homepage_block_7_check');
    $block7_slide = getDataJson($page->fields, 'config_colums_json_homepage_block_7_thongtin');
    ?>
    @if( $block7_check && $block7_check != null && $block7_check[0] == 'Hiển thị' )
    <!--Why Choose Five Start-->
    <section class="why-choose-five">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="why-choose-five__left">
                        <div class="why-choose-five__img-box wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <div class="why-choose-five__img">
                                <img src="{{ asset(showField($page->fields, 'config_colums_input_homepage_block_7_image')) }}" alt="{{ asset(showField($page->fields, 'config_colums_input_homepage_block_7_title_nho')) }}">
                            </div>
                            <div class="why-choose-five__shape-1">
                                <img src="{{ asset('frontend/images/why-choose-five-shape-1.png') }}" alt="{{ asset(showField($page->fields, 'config_colums_input_homepage_block_7_title_nho')) }}">
                            </div>
                            <div class="why-choose-five__shape-2">
                                <img src="{{ asset('frontend/images/why-choose-five-shape-2.png') }}" alt="{{ asset(showField($page->fields, 'config_colums_input_homepage_block_7_title_nho')) }}">
                            </div>
                            <div class="why-choose-five__shape-3">
                                <img src="{{ asset('frontend/images/why-choose-five-shape-3.png') }}" alt="{{ asset(showField($page->fields, 'config_colums_input_homepage_block_7_title_nho')) }}">
                            </div>
                            <div class="why-choose-five__shape-4">
                                <img src="{{ asset('frontend/images/why-choose-five-shape-4.png') }}" alt="{{ asset(showField($page->fields, 'config_colums_input_homepage_block_7_title_nho')) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="why-choose-five__right">
                        <div class="section-title-four text-left">
                            <span class="section-title-four__tagline">{{ showField($page->fields, 'config_colums_input_homepage_block_7_title_nho') }}</span>
                            <h2 class="section-title-four__title">{{ showField($page->fields, 'config_colums_input_homepage_block_7_title_lon') }}</h2>
                        </div>
                        @if( $block7_slide && $block7_slide->image )
                        <ul class="why-choose-five__points-list list-unstyled">
                            @foreach( $block7_slide->image as $k => $v )
                            <li>
                                <div class="icon">
                                    <img src="{{ asset($v) }}" alt="{{ $block7_slide->title[$k] }}">
                                </div>
                                <div class="content">
                                    <h3>{{ $block7_slide->title[$k] }}</h3>
                                    <p>
                                        <?php
                                        $block7_sub_desc = preg_split("/\\r\\n|\\r|\\n/", $block7_slide->desc[$k]);
                                        ?>
                                        {{ implode('<br>', $block7_sub_desc) }}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose Five End-->
    @endif

    <?php 
    $block8_check = getDataJson($page->fields, 'config_colums_checkbox_homepage_block_8_check');
    ?>
    @if( $block8_check && $block8_check != null && $block8_check[0] == 'Hiển thị' )
    <!--Get Insuracne Three Start-->
    <section class="get-insuracne-three" id="contact">
        <div class="get-insuracne-three__shape-1 float-bob-y">
            <img src="{{ asset('frontend/images/get-insuracne-three-shape-1.png') }}" alt="">
        </div>
        <div class="get-insuracne-three__bg"
            style="background-image: url({{ asset(showField($page->fields, 'config_colums_input_homepage_block_8_image')) }});">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-4">
                    <div class="get-insuracne-three__left">
                        <div class="get-insuracne-three__video-link">
                            @if( !empty(showField($page->fields, 'config_colums_input_homepage_block_8_link_video')) )
                            <a href="{{ showField($page->fields, 'config_colums_input_homepage_block_8_link_video') }}" class="video-popup">
                                <div class="get-insuracne-three__video-icon">
                                    <span class="fa fa-play"></span>
                                    <i class="ripple"></i>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="get-insuracne-three__right">
                        <div class="get-insuracne-three__right-bg"
                            style="background-image: url({{ asset('frontend/images/get-insuracne-three-right-bg.png') }});">
                        </div>
                        <div class="section-title-four text-left">
                            <span class="section-title-four__tagline">{{ showField($page->fields, 'config_colums_input_homepage_block_8_title_nho') }}</span>
                            <h2 class="section-title-four__title">{{ showField($page->fields, 'config_colums_input_homepage_block_8_title_lon') }}</h2>
                        </div>
                        <div class="get-insuracne-three__tab clearfix">
                            <div class="get-insuracne-three__tab-box tabs-box clearfix">
                                <div class="get-insuracne-three__inner clearfix">
                                    <div class="get-insuracne-three__tab-bottom">
                                        <div class="tabs-content">
                                            <!--tab-->
                                            <div class="tab active-tab" id="formProduct">
                                                <div class="get-insuracne-three__content">
                                                    <form class="get-insuracne-three__form">
                                                        <div class="get-insuracne-three__content-box">
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="text" placeholder="Họ và tên"
                                                                    name="fullname">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <input type="email" placeholder="Email"
                                                                    name="email">
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <textarea name="message" placeholder="Nội dung"></textarea>
                                                            </div>
                                                            <div class="get-insuracne-three__input-box">
                                                                <select class="selectpicker"
                                                                    aria-label="Default select example" name="product">
                                                                    <option selected>- Chọn sản phẩm -</option>
                                                                    @if( $homeProduct )
                                                                    @foreach( $homeProduct as $v )
                                                                        <option value="{{ $v->id }}">{{  $v->title }}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="get-insuracne-three__content-bottom">
                                                            <button type="submit"
                                                                class="thm-btn-three get-insuracne-three__btn">Đăng ký<span class="icon-right-arrow1"></span>
                                                            </button>
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
    @endif

    @if( $homeNews && $homeNews->posts )
    <!--News Six Start-->
    <section class="news-six" id="blog">
        <div class="container">
            <div class="section-title-four text-center">
                <span class="section-title-four__tagline">{{ $homeNews->title }}</span>
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

@endsection
