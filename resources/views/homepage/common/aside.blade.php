<?php
$menu_aside = getMenus('menu-aside');
$news_aside = \App\Models\Article::select('id', 'title', 'slug', 'image')->where(['alanguage' => config('app.locale'), 'publish' => 0, 'highlight' => 1])->orderBy('order', 'asc')->orderBy('id', 'desc')->limit(5)->get();
?>
<div class="w-full md:w-1/4 px-[15px]">
    <aside class="asider-primary mt-[20px] md:mt-0">
        @if( $menu_aside->menu_items->first() && count($menu_aside->menu_items->first()->children) > 0 )
        <div class="item-sidebar mb-[15px]">
            <h3 class="title-wd bg-color_primary p-[10px] text-white uppercase">
                {{ $menu_aside->menu_items->first()->title }}
            </h3>
            <div class="nav-item-sidebar">
                <ul class="border border-gray-100">
                    @foreach( $menu_aside->menu_items->first()->children as $item )
                    <li class="border-b border-gray-100 p-[7px] px-[10px]">
                        <a href="{{ url($item->slug) }}" class="hover:opacity-80 transition-all">
                            <i class="fa-solid fa-angles-right mr-[5px] text-f11"></i>
                            {{ $item->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="item-sb mb-[15px]">
            <h3 class="title-wd bg-color_primary p-[10px] text-white uppercase">
                Hỗ trợ trực tuyến
            </h3>
            <div class="nav-item border border-gray-100 p-[15px]">
                <p class="text-f15 mb-[5px]"><a href="tel:{{ $fcSystem['contact_hotline'] }}">Call: {{ $fcSystem['contact_hotline'] }}</a></p>
                <p class="text-f15 mb-[5px]">
                    <a href="mailto:{{ $fcSystem['contact_email'] }}">Email: {{ $fcSystem['contact_email'] }}</a>
                </p>
                <p class="text-f15 mb-[5px]"><a href="{{ url('/') }}">{{ $fcSystem['contact_website'] }}</a></p>
                <ul class="flex flex-wrap justify-left mt-[10px]">
                    <li class="mr-[10px]">
                        <a href="{{ $fcSystem['social_facebook'] }}"><img src="{{ asset('frontend/cts/img/i1.png') }}" alt="Facebook"/></a>
                    </li>
                    <li class="mr-[10px]">
                        <a href="{{ $fcSystem['social_google_plus'] }}"><img src="{{ asset('frontend/cts/img/i2.png') }}" alt="Google plus"/></a>
                    </li>
                    <li class="mr-[10px]">
                        <a href="{{ $fcSystem['social_twitter'] }}"><img src="{{ asset('frontend/cts/img/i3.png') }}" alt="Twitter"/></a>
                    </li>
                    <li class="mr-[10px]">
                        <a href="{{ $fcSystem['social_pinterest'] }}"><img src="{{ asset('frontend/cts/img/i5.png') }}" alt="Pinterest"/></a>
                    </li>
                </ul>
            </div>
        </div>

        @if( $news_aside && count($news_aside) > 0 )
        <div class="item-sidebar mb-[15px]">
            <div class="acc border border-green">
                <h3 class="title-wd bg-color_primary p-[10px] text-white uppercase">
                    TIN MỚI
                </h3>
                <div class="p-[10px]">
                    @foreach( $news_aside as $iem )
                    <div class="flex flex-wrap justify-between mx-[-5px] border-b border-gray-100 pb-[10px] mb-[10px]">
                        <div class="w-1/3 px-[5px]">
                            <div class="img hover-zoom">
                                <a href="{{ route('routerURL', ['slug' => $iem->slug]) }}">
                                    <img src="{{ asset($iem->image) }}" alt="{{ $iem->title }}" class="w-full object-cover" style="height: 62px"/>
                                </a>
                            </div>
                        </div>
                        <div class="w-2/3 px-[5px]">
                            <div class="nav-img">
                                <h3 class="text-f14" style="
                                overflow: hidden;
                                text-overflow: ellipsis;
                                line-height: 20px;
                                -webkit-line-clamp: 3;
                                height: 60px;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;
                              ">
                                    <a href="{{ route('routerURL', ['slug' => $iem-> slug]) }}" class="hover:opacity-80 transition-all">{{ $iem->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </aside>
</div>