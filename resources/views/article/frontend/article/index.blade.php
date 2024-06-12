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

                    @if( $productAside )
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Sản phẩm phần mềm</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach( $productAside as $k => $v )
                            <li>
                                <div class="sidebar__post-image">
                                    <span class="number">{{ $k+1 }}</span>
                                    <img src="{{ asset(!empty($v->image)?$v->image:'images/404.jpg') }}" alt="{{ $v->title }}">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        @if( $v->user )
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> {{ $v->user->name }}</span>
                                        @endif
                                        <a href="news-details.html">{{ $v->title }}</a>
                                    </h3>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection