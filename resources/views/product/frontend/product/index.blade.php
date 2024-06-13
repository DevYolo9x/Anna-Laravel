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

{!!htmlBreadcrumb($detail->title, $breadcrumb, '')!!}

{{-- Detail --}}
<section class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="product-details__img">
                            <img src="{{ asset($detail->image) }}" alt="{{ $detail->title }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="product-details__top">
                            <h3 class="product-details__title">{{ $detail->title }}</h3>
                        </div>
                        <div class="product-details__reveiw">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>2 Customer Reviews</span>
                        </div>
                        <div class="product-details__content">
                            {!! $detail->description !!}
                        </div>

                        <div class="product-details__social">
                            <div class="title">
                                <h3>Share with friends</h3>
                            </div>
                            <div class="product-details__social-link">
                                <a href="#"><span class="fab fa-twitter"></span></a>
                                <a href="#"><span class="fab fa-facebook"></span></a>
                                <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                <a href="#"><span class="fab fa-instagram"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="portfolio-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                            <li data-filter=".filter-item" class=""><span class="filter-text">All<span class="count">(9)</span></span></li>
                            <li data-filter=".stra" class="active"><span class="filter-text">Strategy<span class="count">(6)</span></span></li>
                            <li data-filter=".busi" class=""><span class="filter-text">Business<span class="count">(7)</span></span></li>
                            <li data-filter=".insur" class=""><span class="filter-text">Insurance<span class="count">(2)</span></span></li>
                            <li data-filter=".poli" class=""><span class="filter-text last-pd-none">Policies<span class="count">(5)</span></span></li>
                        </ul>
                    </div>
                </div>
                <div class="row filter-layout masonary-layout" style="position: relative; height: 880px;">
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item stra busi" style="position: absolute; left: 0px; top: 0px;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-1.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-1.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item stra busi insur" style="position: absolute; left: 400px; top: 0px;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-2.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-2.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item stra busi poli" style="position: absolute; left: 800px; top: 0px;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-3.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-3.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item poli busi" style="position: absolute; left: 400px; top: 0px; display: none;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-4.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-4.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item stra poli" style="position: absolute; left: 0px; top: 440px;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-5.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-5.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item insur busi" style="position: absolute; left: 400px; top: 0px; display: none;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-6.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-6.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item stra busi" style="position: absolute; left: 400px; top: 440px;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-7.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-7.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item stra poli" style="position: absolute; left: 800px; top: 440px;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-8.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-8.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item poli busi" style="position: absolute; left: 400px; top: 440px; display: none;">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="assets/images/project/portfolio-1-9.jpg" alt="">
                                <div class="portfolio__plus">
                                    <a href="assets/images/project/portfolio-1-9.jpg" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Strategy</p>
                                    <h4 class="portfolio__title"><a href="portfolio-details.html">Insurance policy</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio Single End-->
                </div>
            </div>
        </section>
@endsection

@push('javascript')

@endpush

@push('css')

@endpush