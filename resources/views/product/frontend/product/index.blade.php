@extends('homepage.layout.home')

@section('content')

<?php

$listAlbums = json_decode($detail->image_json, true);

$price = getPrice(array('price' => $detail->price, 'price_sale' => $detail->price_sale, 'price_contact' => $detail->price_contact));


if (count($detail->product_versions) > 0) {
    $type = 'variable';
} else {
    $type = 'simple';
}
$version = json_decode(base64_decode($detail->version_json), true);

$attribute_tmp = [];

$attributesID =  [];

if (!empty($version) && !empty($version[2])) {

    foreach ($version[2] as $item) {

        foreach ($item as $val) {

            $attributesID[] = $val;
        }
    }

    if (!empty($attributesID)) {

        $attribute_tmp = \App\Models\Attribute::whereIn('id', $attributesID)->select('id', 'title', 'catalogueid')->with('catalogue')->get();
    }
}

$attributes = [];

if (!empty($attribute_tmp)) {

    foreach ($attribute_tmp as $item) {

        $attributes[] = array(

            'id' => $item->id,

            'title' => $item->title,

            'titleC' => $item->catalogue->title,

        );
    }
}

$attributes = collect($attributes)->groupBy('titleC')->all();




$product_stock_title = '';

?>

<?php if ($type == 'simple') { ?>

    <?php

    $hiddenAddToCart = 0;

    $quantityStock = '';

    $simpleStock = $detail->product_stocks->sum('value');

    if ($detail->inventory == 1) {

        if ($detail->inventoryPolicy == 0) {

            if ($simpleStock == 0) {

                $hiddenAddToCart = 1;

                $product_stock_title =  '<span class="product_stock">' . trans('index.OutOfStock') . '</span>';
            } else {

                $quantityStock = $simpleStock;

                $product_stock_title = '<span class="product_stock">' . $simpleStock . '</span> ' . trans('index.InOfStock');
            }
        } else {

            $product_stock_title = '<span class="product_stock"></span> ' . trans('index.InOfStock');
        }
    } else {

        $product_stock_title = '<span class="product_stock"></span> ' . trans('index.InOfStock');
    }

    ?>

<?php } ?>

<?php



$policyProduct = Cache::remember('policyProduct', 10000, function () {

    $policyProduct = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'policy-detail-product'])->with('slides')->first();

    return $policyProduct;
});

// $fields = \App\Models\ConfigPostmeta::select('meta_value')->where('meta_key', 'config_colums_json_policy')->first();

// $fields = json_decode($fields->meta_value, TRUE);

$wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'], TRUE) : NULL;

$i_class = 'fa-regular';
if (!empty($wishlist)) {
    if (in_array($detail->id, $wishlist)) {
        $i_class = 'fa-solid';
    }
}

?>

<input type="hidden" value="<?php echo $detail->id ?>" id="detailProductID">

{{-- Detail --}}
<div id="main" class="sitemap main-product-detail pb-[30px]">
    {!!htmlBreadcrumb($detail->title,$breadcrumb)!!}
    <div class="content-product-detail pt-[30px]">
        <div class="container mx-auto pl-4 pr-4">
            <div class="flex flex-wrap justify-between -mx-3">
                <div class="w-full md:w-1/2 px-3">
                    <div class="slider">
                        <div class="slider__flex">
                            <div class="slider__images">
                                <div class="swiper-container">
                                    <!-- Слайдер с изображениями -->
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="slider__image">
                                                <img src="{{ asset($detail->image) }}" alt="{{ $detail->title }}"/>
                                            </div>
                                        </div>
                                        @if(!empty($listAlbums))
                                            @foreach($listAlbums as $key=> $item)
                                            <div class="swiper-slide">
                                                <div class="slider__image">
                                                    <img src="{{ asset($item) }}" alt="{{ $detail->title }}"/>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="slider__col mt-[15px]">
                                <div class="slider__prev">
                                    <i class="fa-solid fa-angle-left"></i>
                                </div>
                                <!-- Кнопка для переключения на предыдущий слайд -->

                                <div class="slider__thumbs">
                                    <div class="swiper-container">
                                        <!-- Слайдер с превью -->
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="slider__image">
                                                    <img src="{{ asset($detail->image) }}" alt="{{ $detail->title }}"/>
                                                </div>
                                            </div>
                                            @if(!empty($listAlbums))
                                                @foreach($listAlbums as $key=> $item)
                                                    <div class="swiper-slide">
                                                        <div class="slider__image">
                                                            <img src="{{ asset($item) }}" alt="{{ $detail->title }}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="slider__next">
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                                <!-- Кнопка для переключения на следующий слайд -->
                            </div>
                        </div>
                    </div>
                    <style>
                        .slider .swiper-container {
                            width: 100%;
                            height: 100%;
                        }

                        .slider__prev,
                        .slider__next {
                            cursor: pointer;

                            color: #333;
                        }

                        .slider__prev:focus,
                        .slider__next:focus {
                            outline: none;
                        }

                        .content-product-detail .slider__col {
                            position: relative;
                        }

                        .content-product-detail .slider__col .slider__prev {
                            position: absolute;
                            top: 50%;
                            left: 5px;
                            transform: translateY(-50%);
                            z-index: 999;
                        }

                        .content-product-detail .slider__col .slider__next {
                            position: absolute;
                            top: 50%;
                            right: 5px;
                            transform: translateY(-50%);
                            z-index: 999;
                        }

                        .slider__thumbs .slider__image {
                            transition: 0.25s;
                            -webkit-filter: grayscale(100%);
                            filter: grayscale(100%);
                            opacity: 0.5;
                        }

                        .slider__thumbs .slider__image:hover {
                            opacity: 1;
                        }

                        .slider__thumbs .swiper-slide-thumb-active .slider__image {
                            -webkit-filter: grayscale(0%);
                            filter: grayscale(0%);
                            opacity: 1;
                        }

                        .slider__images {
                            height: 400px;
                        }

                        .slider__images .slider__image img {
                            transition: 3s;
                        }

                        .slider__images .slider__image:hover img {
                            transform: scale(1.1);
                        }

                        .slider__image {
                            width: 100%;
                            height: 100%;

                            overflow: hidden;
                        }

                        .slider__image img {
                            display: block;
                            width: 100%;
                            height: 100%;

                            object-fit: contain;
                        }
                    </style>
                    <!-- Swiper JS -->
                    <!-- END: slide product image PC-->
                </div>
                <div class="w-full md:w-1/2 px-3 lg:mt-0 md:mt-0 sm:mt-4 mt-4">
                    <h1 class="text-f25 mb-[5px] font-medium">
                        {{ $detail->title }}
                    </h1>
                    <p class="text-f14 mb-[3px] hide hidden">
                        Mã: <span class="text-blue_primary tp_product_code">{{ $detail->code }}</span>
                    </p>
                    <p class="text-f14 hide hidden">
                        Tình trạng:
                        <span class="text-blue_primary js_product_stock">{!! $product_stock_title !!}</span>
                    </p>
                    <p class="price mt-[10px] border-b-[1px] pb-[10px]">
                      <span class="text-f25 font-bold text-red-600">{{$price['price_final']}} </span>
                        <del class="text-f16 text-gray-400 pl-[10px]">{{$price['price_old']}}</del>
                    </p>

                    <div class="size-detail mt-[15px]">
                        <!--START: product version -->
                        @if ($type == 'variable' && !empty($attributes))
                            <?php $i = 0;
                            ?>
                            @foreach($attributes as $key => $item)
                                <?php $i++; ?>
                                @if(count($item) > 0)
                                    <div class="box-variable mb-3">
                                        <div class="font-bold text-base mb-1">{{$key}}</div>
                                        <div class="flex flex-wrap">
                                            @foreach ($item as $k => $val)
                                                <a href="javascript:void(0)" class="tp_item_variable variable_{{$i}} tp_item_variable_{{$val['id']}} py-1 px-5 border mb-2 mr-2 @if($k == 0) checked @endif" data-id="{{$val['id']}}" data-stt="<?php echo !empty($i == count($attributes)) ? 0 : 1 ?>">
                                                    {{$val['title']}}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                    @endif
                    <!--END: product version -->
                    </div>

                    <div class="w-full py-4">
                        <div class="font-black mb-2">Số lượng</div>
                        <div class="custom-number-input h-10 w-32 flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                            <button class="card-dec bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none leading-[50px]" style="width: 35px;">
                                <span class="m-auto text-2xl font-thin">−</span>
                            </button>
                            <input type="number"
                                    class="tp_cardQuantity card-quantity outline-none focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black md:text-basecursor-default flex items-center text-gray-700 outline-none"
                                    name="custom-input-number"
                                    value="1"  style="width: 100px;"/>
                            <button class="card-inc bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer leading-[50px]" style="width: 35px;">
                                <span class="m-auto text-2xl font-thin">+</span>
                            </button>
                        </div>
                        <div class="desc text-f14 mt-[15px] content-content">
                            {!! $detail->description !!}
                        </div>
                        <div class="list-content" style="display: none">
                            <p class="note italic mt-[5px]">
                                *Lưu ý:
                                <span class="text-red">Giá chưa bao gồm VAT.</span>
                            </p>
                        </div>
                        <div class="mt-5">
                            <button data-quantity="1" data-id="{{$detail->id}}" data-title="{{$detail->title}}" data-price="<?php echo !empty($price['price_final_none_format']) ? $price['price_final_none_format'] : 0 ?>" data-cart="0" data-src="" data-type="{{$type}}"  class="tp_addToCart addtocart uppercase  h-[40px]  mb-[10px] border border-color_primary text-white bg-color_primary hover:text-color_primary hover:bg-white transition-all flex-1 cursor-pointer items-center inline-flex rounded-md px-6 justify-center" data-title-version="">
                                Thêm vào giỏ hàng
                            </button>
                            <button data-cart="1" data-quantity="1" data-id="{{$detail->id}}" data-title="{{$detail->title}}" data-price="<?php echo !empty($price['price_final_none_format']) ? $price['price_final_none_format'] : 0 ?>" data-cart="0" data-src="" data-type="{{$type}}" class="tp_addToCart addtocart uppercase  h-[40px]  mb-[10px] border border-color_primary text-white bg-color_primary hover:text-color_primary hover:bg-white transition-all flex-1 cursor-pointer items-center inline-flex rounded-md px-6 justify-center"
                                    data-title-version="">
                                Mua hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start: box 5 -->
            <section class="mt-[30px] md:mt-[60px] description-section wow fadeInUp">
                <div class="tab-detail">
                    <nav class="tabs flex justify-start border border-gray-200">
                        <button data-target="panel-1" class="px-[10px]  py-[10px] md:px-[15px] text-f16 font-bold mr-[5px] md:mr-[15px] tab active block hover:text-green focus:outline-none">
                            Thông tin
                        </button>
                        <button data-target="panel-2" class="hide hidden px-[10px]  py-[10px] md:px-[15px]  text-f16 font-bold mr-[5px] md:mr-[15px] tab block hover:text-green focus:outline-none">
                            Thông tin kỹ thuật
                        </button>

                    </nav>
                </div>

                <div id="panels"
                        class="p-[10px] md:p-[20px] bg-white border border-gray-100">
                    <div class="panel-1 tab-content active">
                        <div class="content-content">
                            {!! $detail->content !!}
                        </div>
                    </div>
                    <div class="panel-2 tab-content">
                        <div class="content-content">
                            {!! showField($detail->fields, 'config_colums_editor_product_specifications') !!}
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: box5 -->
            @if(!empty($productSame))
            <div class="other-product mt-[20px] md:mt-[40px]">
                <h2 class="mb-[20px]  text-f25  font-bold leading-[30px] md:leading-[40px] text-color_primary">
                    Sản phẩm liên quan
                </h2>
                <div class="slider-raleted-product owl-carousel">
                    @foreach( $productSame as $item )
                        {!! htmlItemProduct( $item ) !!}
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@push('javascript')

<script type="text/javascript" src="{{asset('product/rating/bootstrap-rating.min.js')}}"></script>
<script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>
<script src="{{asset('frontend/js/common/swiper-bundle.min.js')}}"></script>

<script src="{{asset('frontend/library/js/common.js')}}"></script>

<script>
    //hieu ung wow------------------------------------------
    wow = new WOW({
        animateClass: "animated",
        offset: 100,
        callback: function (box) {
            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">");
        },
    });
    wow.init();

    const sliderThumbs = new Swiper(".slider__thumbs .swiper-container", {
        direction: "vertical",
        slidesPerView: 4,
        spaceBetween: 10,
        navigation: {
            nextEl: ".slider__next",
            prevEl: ".slider__prev",
        },
        freeMode: true,
        breakpoints: {
            0: {
                direction: "horizontal",
            },
            768: {
                direction: "horizontal",
            },
        },
    });
    const sliderImages = new Swiper(".slider__images .swiper-container", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 32,
        mousewheel: true,
        navigation: {
            nextEl: ".slider__next",
            prevEl: ".slider__prev",
        },
        grabCursor: true,
        thumbs: {
            swiper: sliderThumbs,
        },
        breakpoints: {
            0: {
                direction: "horizontal",
            },
            768: {
                direction: "vertical",
            },
        },
    });
</script>

@endpush

@push('css')

<link rel="stylesheet" href="{{asset('frontend/library/css/products.css')}}" />
<link rel="stylesheet" href="{{asset('frontend/cts/css/swiper-bundle.min.css')}}" />

<style>
    .box-variable .tp_item_variable.checked {
        border-color: red;
    }
</style>

<script>
    var module = 'product';
</script>

@endpush