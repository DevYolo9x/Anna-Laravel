<?php
$menu_header = getMenus('menu-header');
$menu_top = getMenus('menu-top');
?>
<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>

<div class="preloader">
    <div class="preloader__image"></div>
</div>
<!-- /.preloader -->


<div class="page-wrapper">

    <header class="main-header-six" style="display: none">
        <div class="main-header-six__top">
            <div class="main-header-six__top-inner">
                <div class="main-header-six__top-shape-1"
                    style="background-image: url(http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/shapes/main-header-six-top-shape-1.png);">
                </div>
                <div class="main-header-six__top-address">
                    <ul class="list-unstyled main-header-six__top-address-list">
                        <li>
                            <i class="icon">
                                <span class="icon-telephone-call"></span>
                            </i>
                            <div class="text">
                                <p><a href="tel:{{ $fcSystem['contact_hotline'] }}">{{ $fcSystem['contact_hotline'] }}</a></p>
                            </div>
                        </li>
                        <li>
                            <i class="icon">
                                <span class="fas fa-envelope"></span>
                            </i>
                            <div class="text">
                                <p><a href="mailto:{{ $fcSystem['contact_email'] }}">{{ $fcSystem['contact_email'] }}</a></p>
                            </div>
                        </li>
                        <li>
                            <i class="icon">
                                <span class="icon-pin"></span>
                            </i>
                            <div class="text">
                                <p>Địa chỉ...</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="main-header-six__top-right">
                    <div class="main-header-six__top-social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="main-menu main-menu-six">
            <div class="main-menu-six__wrapper">
                <div class="main-menu-six__wrapper-inner">
                    <div class="main-menu-six__logo-box">
                        <div class="main-menu-six__logo">
                            <a href="index.html">
                                <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/update-17-06-2023/resources/main-menu-six-logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="main-menu-six__left">
                        <div class="main-menu-six__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list one-page-scroll-menu">
                                <li class="scrollToLink"><a href="#home">Home</a></li>
                                <li class="scrollToLink"><a href="#about">About</a></li>
                                <li class="scrollToLink"><a href="#services">Services</a></li>
                                <li class="scrollToLink"><a href="#testimonials">Testimonials</a></li>
                                <li class="scrollToLink"><a href="#team">Team</a></li>
                                <li class="scrollToLink"><a href="#contact">Contact</a></li>
                                <li class="scrollToLink"><a href="#blog">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu-six__right">
                        <div class="main-menu-six__search-user-get-quote-btn">
                            <div class="main-menu-six__search-box">
                                <a href="#"
                                    class="main-menu-six__search search-toggler icon-magnifying-glass"></a>
                            </div>
                            <div class="main-menu-six__get-quote-btn-box">
                                <a href="contact.html" class="thm-btn-three main-menu-six__get-quote-btn">Get a
                                    Quote <span class="fas fa-paper-plane"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="stricky-header stricked-menu main-menu main-menu-six" style="display: none">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    {{-- New header --}}
    <header class="main-header clearfix">
        <div class="main-header__top">
            <div class="container">
                <div class="main-header__top-inner">
                    <div class="main-header__top-address">
                        <ul class="list-unstyled main-header__top-address-list">
                            <li>
                                <i class="icon">
                                    <span class="icon-pin"></span>
                                </i>
                                <div class="text">
                                    <p>{{ $fcSystem['contact_address'] }}</p>
                                </div>
                            </li>
                            <li>
                                <i class="icon">
                                    <span class="icon-email"></span>
                                </i>
                                <div class="text">
                                    <p><a href="mailto:{{ $fcSystem['contact_email'] }}">{{ $fcSystem['contact_email'] }}</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="main-header__top-right">
                        @if( $menu_top && $menu_top->menu_items )
                        <div class="main-header__top-menu-box">
                            <ul class="list-unstyled main-header__top-menu">
                                @foreach( $menu_top->menu_items as $v )
                                <li><a href="{{ url($v->slug) }}" title="{{ $v->title }}">{{ $v->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="main-header__top-social-box">
                            <div class="main-header__top-social">
                                @if( !empty($fcSystem['social_twitter']) )
                                <a href="{{ $fcSystem['social_twitter'] }}" rel="nofollow"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if( !empty($fcSystem['social_facebook']) )
                                <a href="{{ $fcSystem['social_facebook'] }}" rel="nofollow"><i class="fab fa-facebook"></i></a>
                                @endif
                                @if( !empty($fcSystem['social_pinterest']) )
                                <a href="{{ $fcSystem['social_pinterest'] }}" rel="nofollow"><i class="fab fa-pinterest-p"></i></a>
                                @endif
                                @if( !empty($fcSystem['social_instagram']) )
                                <a href="{{ $fcSystem['social_instagram'] }}" rel="nofollow"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if( !empty($fcSystem['social_youtube']) )
                                <a href="{{ $fcSystem['social_youtube'] }}" rel="nofollow"><i class="fab fa-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="main-menu clearfix">
            <div class="main-menu__wrapper clearfix">
                <div class="container">
                    <div class="main-menu__wrapper-inner clearfix">
                        <div class="main-menu__left">
                            <div class="main-menu__logo">
                                <a href="{{ url('/') }}"><img src="{{ asset($fcSystem['homepage_logo']) }}" alt="{{ $fcSystem['homepage_brandname'] }}"></a>
                            </div>
                            <div class="main-menu__main-menu-box">
                                <div class="main-menu__main-menu-box-inner">
                                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                    <ul class="main-menu__list">
                                        @if( $menu_header && $menu_header->menu_items )
                                            @foreach( $menu_header->menu_items as $v )
                                                <li class="dropdown @if(Request::url() == url($v->slug)) current @endif @if($v->isnew==1) is-new-menu  @endif">
                                                    <a href="{{ url($v->slug) }}" title="{{ $v->title }}" @if($v->target=='_blank') target="_blank" @endif>
                                                        @if($v->isnew==1)
                                                            <span>NEW</span>
                                                        @endif
                                                        {{ $v->title }}
                                                    </a>
                                                    @if( $v->children && count($v->children) )
                                                    <ul>
                                                        @foreach( $v->children as $vc )
                                                        <li>
                                                            <a href="{{ url($vc->slug) }}" title="{{ $vc->title }}">
                                                                {{ $vc->title }}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="main-menu__main-menu-box-search-get-quote-btn">
                                    <div class="main-menu__main-menu-box-search">
                                        <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                        <a href="cart.html" class="main-menu__cart insur-two-icon-shopping-cart"></a>
                                    </div>
                                    <div class="main-menu__main-menu-box-get-quote-btn-box">
                                        <a href="{{ url('lien-he') }}" class="thm-btn main-menu__main-menu-box-get-quote-btn">Liên hệ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu__right">
                            <div class="main-menu__call">
                                <div class="main-menu__call-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="main-menu__call-content">
                                    <a href="tel:{{ $fcSystem['contact_hotline'] }}">{{ $fcSystem['contact_hotline'] }}</a>
                                    @if( !empty($fcSystem['contact_hotline_1']) )
                                        / <a href="tel:{{ $fcSystem['contact_hotline_1'] }}">{{ $fcSystem['contact_hotline_1'] }}</a>
                                    @endif
                                    <p>Hotline</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">
            <div class="main-menu__wrapper clearfix">
                <div class="container">
                    <div class="main-menu__wrapper-inner clearfix">
                        <div class="main-menu__left">
                            <div class="main-menu__logo">
                                <a href="{{ url('/') }}"><img src="{{ $fcSystem['homepage_logo'] }}" alt="{{ $fcSystem['homepage_brandname'] }}"></a>
                            </div>
                            <div class="main-menu__main-menu-box">
                                <div class="main-menu__main-menu-box-inner">
                                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                    <ul class="main-menu__list">
                                        @if( $menu_header && $menu_header->menu_items )
                                            @foreach( $menu_header->menu_items as $v )
                                                <li class="dropdown @if(Request::url() == url($v->slug)) current @endif @if($v->isnew==1) is-new-menu  @endif">
                                                    <a href="{{ url($v->slug) }}" title="{{ $v->title }}" @if($v->target=='_blank') target="_blank" @endif>
                                                        @if($v->isnew==1)
                                                            <span>NEW</span>
                                                        @endif
                                                        {{ $v->title }}
                                                    </a>
                                                    @if( $v->children && count($v->children) )
                                                    <ul>
                                                        @foreach( $v->children as $vc )
                                                        <li>
                                                            <a href="{{ url($vc->slug) }}" title="{{ $vc->title }}">
                                                                {{ $vc->title }}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="main-menu__main-menu-box-search-get-quote-btn">
                                    <div class="main-menu__main-menu-box-search">
                                        <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                        <a href="cart.html" class="main-menu__cart insur-two-icon-shopping-cart"></a>
                                    </div>
                                    <div class="main-menu__main-menu-box-get-quote-btn-box">
                                        <a href="{{ url('lien-he') }}" class="thm-btn main-menu__main-menu-box-get-quote-btn">Liên hệ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu__right">
                            <div class="main-menu__call">
                                <div class="main-menu__call-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="main-menu__call-content">
                                    <a href="tel:{{ $fcSystem['contact_hotline'] }}">{{ $fcSystem['contact_hotline'] }}</a>
                                    @if( !empty($fcSystem['contact_hotline_1']) )
                                        / <a href="tel:{{ $fcSystem['contact_hotline_1'] }}">{{ $fcSystem['contact_hotline_1'] }}</a>
                                    @endif
                                    <p>Hotline</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.sticky-header__content -->
    </div>