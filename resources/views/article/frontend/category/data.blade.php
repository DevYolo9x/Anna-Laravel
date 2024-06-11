@if($data)
    @foreach ($data as $k => $item)
        <!--News One Single Start-->
        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
            <div class="news-one__single">
                <div class="news-one__img">
                    <img src="{{ asset(!empty($item->image)?$item->image:'images/404.png') }}" alt="{{ $item->title }}">
                    @if( isset($detail) )
                    <div class="news-one__tag">
                        <p><i class="far fa-folder"></i>{{ $detail->title }}</p>
                    </div>
                    @endif
                    <div class="news-one__arrow-box">
                        <a href="{{ route('routerURL', ['slug' => $item->slug]) }}" class="news-one__arrow">
                            <span class="icon-right-arrow1"></span>
                        </a>
                    </div>
                </div>
                <div class="news-one__content">
                    <ul class="list-unstyled news-one__meta">
                        <li>
                            <a href="{{ route('routerURL', ['slug' => $item->slug]) }}"><i class="far fa-calendar"></i> {{ date('d', strtotime($item->created_at)) . ' Tháng ' . date('m', strtotime($item->created_at)) . ', ' . date('Y', strtotime($item->created_at)) }} </a>
                        </li>
                    </ul>
                    <h3 class="news-one__title"><a href="{{ route('routerURL', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h3>
                    <p class="news-one__text">{!! $item->description !!}</p>
                    <div class="news-one__read-more">
                        <a href="{{ route('routerURL', ['slug' => $item->slug]) }}">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--News One Single End-->
    @endforeach
    <div class="pagenavi wow fadeInUp animated">
        <?php echo $data->links() ?>
    </div>
@endif