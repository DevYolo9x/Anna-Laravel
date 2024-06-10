@extends('homepage.layout.home')
@section('content')
{{-- Article --}}
<div id="main" class="sitemap main-new" style="display: none">
    {!!htmlBreadcrumb($detail->title, $breadcrumb)!!}
    <div class="content-new-page py-[30px] md:py-[50px]">
        <div class="container mx-auto px-3">
            @include('article.frontend.category.data')
        </div>
    </div>
</div>


<section class="page-header">
    <div class="page-header-bg" style="background-image: url(http://html2020.tamphat.edu.vn/insur-html/assets/images/backgrounds/page-header-bg.jpg)">
    </div>
    <div class="page-header-shape-1"><img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/shapes/page-header-shape-1.png" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>news</li>
            </ul>
            <h2>Latest news</h2>
        </div>
    </div>
</section>
<section class="news-one">
    <div class="container">
        <div class="row">
            <!--News One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/blog/news-1-1.jpg" alt="">
                        <div class="news-one__tag">
                            <p><i class="far fa-folder"></i>BUSINESS</p>
                        </div>
                        <div class="news-one__arrow-box">
                            <a href="news-details.html" class="news-one__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2023 </a>
                            </li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                            </li>
                        </ul>
                        <h3 class="news-one__title"><a href="news-details.html">Which allows you to pay down
                                insurance bills</a></h3>
                        <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat
                            mattis.</p>
                        <div class="news-one__read-more">
                            <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--News One Single End-->
            <!--News One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/blog/news-1-2.jpg" alt="">
                        <div class="news-one__tag">
                            <p><i class="far fa-folder"></i>BUSINESS</p>
                        </div>
                        <div class="news-one__arrow-box">
                            <a href="news-details.html" class="news-one__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2023 </a>
                            </li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                            </li>
                        </ul>
                        <h3 class="news-one__title"><a href="news-details.html">Leverage agile frameworks to
                                provide</a></h3>
                        <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat
                            mattis.</p>
                        <div class="news-one__read-more">
                            <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--News One Single End-->
            <!--News One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/blog/news-1-3.jpg" alt="">
                        <div class="news-one__tag">
                            <p><i class="far fa-folder"></i>BUSINESS</p>
                        </div>
                        <div class="news-one__arrow-box">
                            <a href="news-details.html" class="news-one__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2023 </a>
                            </li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                            </li>
                        </ul>
                        <h3 class="news-one__title"><a href="news-details.html">Bring to the table win-win
                                survival strategis</a></h3>
                        <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat
                            mattis.</p>
                        <div class="news-one__read-more">
                            <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--News One Single End-->
            <!--News One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/blog/news-1-4.jpg" alt="">
                        <div class="news-one__tag">
                            <p><i class="far fa-folder"></i>BUSINESS</p>
                        </div>
                        <div class="news-one__arrow-box">
                            <a href="news-details.html" class="news-one__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2023 </a>
                            </li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                            </li>
                        </ul>
                        <h3 class="news-one__title"><a href="news-details.html">It is a long established fact
                                that a reader</a></h3>
                        <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat
                            mattis.</p>
                        <div class="news-one__read-more">
                            <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--News One Single End-->
            <!--News One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/blog/news-1-5.jpg" alt="">
                        <div class="news-one__tag">
                            <p><i class="far fa-folder"></i>BUSINESS</p>
                        </div>
                        <div class="news-one__arrow-box">
                            <a href="news-details.html" class="news-one__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2023 </a>
                            </li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                            </li>
                        </ul>
                        <h3 class="news-one__title"><a href="news-details.html">There are many variations of
                                passages of Lorem</a></h3>
                        <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat
                            mattis.</p>
                        <div class="news-one__read-more">
                            <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--News One Single End-->
            <!--News One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="600ms" style="visibility: visible; animation-delay: 600ms; animation-name: fadeInUp;">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="http://html2020.tamphat.edu.vn/insur-html/assets/images/blog/news-1-6.jpg" alt="">
                        <div class="news-one__tag">
                            <p><i class="far fa-folder"></i>BUSINESS</p>
                        </div>
                        <div class="news-one__arrow-box">
                            <a href="news-details.html" class="news-one__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2023 </a>
                            </li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                            </li>
                        </ul>
                        <h3 class="news-one__title"><a href="news-details.html">Contrary to popular belief,
                                Lorem Ipsum text</a></h3>
                        <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat
                            mattis.</p>
                        <div class="news-one__read-more">
                            <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--News One Single End-->
        </div>
    </div>
</section>
@endsection