@extends('homepage.layout.home')
@section('content')

{!!htmlBreadcrumb($detail->title, $breadcrumb, '')!!}

<section class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="news-details__left">
                    <div class="news-details__img">
                        <img src="assets/images/blog/news-details-img-1.jpg" alt="">
                    </div>
                    <div class="news-details__content">
                        <ul class="list-unstyled news-details__meta">
                            <li><a href="news-details.html"><i class="far fa-calendar"></i> {{ date('d', strtotime($detail->created_at)) . ' Tháng ' . date('m', strtotime($detail->created_at)) . ', ' . date('Y', strtotime($detail->created_at)) }} </a>
                            </li>
                        </ul>
                        <h3 class="news-details__title">{{ $detail->title }}</h3>
                        <div class="content-content">
                            {!! $detail->content !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <form action="{{ route('homepage.searchArticles') }}" class="sidebar__search-form">
                            @csrf
                            <input type="search" name="keyword" placeholder="Tìm kiếm...">
                            <button type="submit"><i class="icon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Latest Posts</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="assets/images/blog/lp-1-1.jpg" alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by Admin</span>
                                        <a href="news-details.html">Get tips to get quick
                                            life insurance</a>
                                    </h3>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="assets/images/blog/lp-1-2.jpg" alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by Admin</span>
                                        <a href="news-details.html">Promoting the Rights of Children</a>
                                    </h3>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="assets/images/blog/lp-1-3.jpg" alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by Admin</span>
                                        <a href="news-details.html">Bring to the table win-win survival</a>
                                    </h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection