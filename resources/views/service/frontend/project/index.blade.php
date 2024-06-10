@extends('homepage.layout.home')
@section('content')
<div id="main" class="sitemap main-new-page-detail pb-[50px]">
    {!!htmlBreadcrumb($detail->title, [])!!}
    <div class="main-content pt-[20px] md:pt-[50px]">
        <div class="container mx-auto px-3">
            <div class="flex flex-wrap justify-between mx-[-15px]">
                <div class="w-full md:w-3/4 px-[15px]">
                    <div class="content-content">
                        <h1 class="text-f20 md:text-f25 font-bold">
                            {{ $detail->title }}
                        </h1>
                        <p class="date text-gray-500 mt-[10px]">
                            {{ date('d/m/Y', strtotime($detail->created_at)) }}
                        </p>
                        <div class="nav-content-content content-content">
                            {!!$detail->content!!}
                        </div>
                    </div>
                    @if(!$sameProject->isEmpty())
                        <div class="other-new pt-[20px] md:pt-[40px]">
                            <h2 class="title-primary pb-[20px] md:pb-[25px] text-center text-f25 md:text-f32 font-bold relative after:content after:absolute after:w-[65px] after:h-[4px] after:bg-color_primary after:bottom-0 after:left-1/2 after:-translate-x-1/2">
                                Bài viết liên quan
                            </h2>
                            <div class="slider-other-new owl-carousel mt-[20px]">
                                @foreach($sameProject as $item)
                                    <div class="item shadow border border-gray-100">
                                        <div class="img hover-zoom">
                                            <a href="{{ route('routerURL', ['slug' => $item->slug]) }}">
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full object-cover" style="height: 200px"/>
                                            </a>
                                        </div>
                                        <div class="nav-img p-[15px]">
                                            <h3 class="title-1 font-bold" style="
                            overflow: hidden;
                            text-overflow: ellipsis;
                            line-height: 22px;
                            -webkit-line-clamp: 2;
                            height: 44px;
                            display: -webkit-box;
                            -webkit-box-orient: vertical;
                          ">
                                                <a href="{{ route('routerURL', ['slug' => $item->slug]) }}" class="transition-all hover:text-color_primary">{{ $item->title }}</a>
                                            </h3>
                                            <p class="date my-[10px] text-gray-600">
                                                <i class="fa-regular fa-calendar-days mr-[5px]"></i>1
                                                {{ date('d/m/Y', strtotime($item->created_at)) }}
                                            </p>
                                            <div class="desc text-f14" style="
                            overflow: hidden;
                            text-overflow: ellipsis;
                            line-height: 22px;
                            -webkit-line-clamp: 3;
                            height: 66px;
                            display: -webkit-box;
                            -webkit-box-orient: vertical;
                          ">
                                                {!! $item->description !!}
                                            </div>
                                            <div class="readmore mt-[10px]">
                                                <a href="{{ route('routerURL', ['slug' => $item->slug]) }}" class="read-more-btn text-color_primary uppercase hover:pl-[10px] transition-all">
                                                    <i class="fas fa-long-arrow-right text-f11 mr-[10px]"></i>
                                                    Xem thêm
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                @include('homepage.common.aside')
            </div>
        </div>
    </div>
</div>

@endsection
