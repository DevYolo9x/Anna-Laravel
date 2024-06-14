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
                        </div>
                        <div class="product-details__content">
                            {!! $detail->description !!}
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
                            <li data-filter=".filter-item" class="active"><span class="filter-text">Đăng ký dùng thử</span></li>
                            <li data-filter=".stra" class=""><span class="filter-text">Tính năng</span></li>
                            <li data-filter=".busi" class=""><span class="filter-text">Đặc điểm nổi bật</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row filter-layout masonary-layout" style="position: relative; height: 880px;">
                    <!--Portfolio Single Start-->
                    <div class="col-xl-12 col-lg-12 col-md-12 filter-item" style="position: absolute; left: 0px; top: 0px;">
                        <form class="get-insurance__form" id="productRegisDemo">
                            @csrf
                            @include('homepage.common.alert')
                            <div class="get-insurance__content-box">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="get-insurance__input-box">
                                            <input type="text" placeholder="Tên công ty *" name="company">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="get-insurance__input-box">
                                            <input type="text" placeholder="Họ và Tên *" name="fullname">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="get-insurance__input-box">
                                            <input type="text" placeholder="Điện thoại *" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="get-insurance__input-box">
                                        <input type="email" placeholder="Email *" name="email">
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="get-insurance__input-box">
                                    <input type="text" placeholder="Địa chỉ *" name="address">
                                </div>
                                <div class="get-insurance__input-box">
                                    <textarea name="message" placeholder="Nội dung *"></textarea>
                                </div>

                                <input type="hidden" name="product_name" value="{{ $detail->title }}" />
                            </div>
                            <div class="text-center">
                            <button type="submit" class="thm-btn get-insurance__btn btn-regis-demo">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                    <!--Portfolio Single End-->
                    
                    <!--Portfolio Single Start-->
                    <div class="col-xl-12 col-lg-12 col-md-12 stra" style="position: absolute; left: 0px; top: 0px;">
                        <div>{!! $detail->content !!}</div>
                    </div>
                    <!--Portfolio Single End-->

                    <!--Portfolio Single Start-->
                    <div class="col-xl-12 col-lg-12 col-md-12 busi" style="position: absolute; left: 0px; top: 0px;">
                        <div>{!! showField($detail->fields, 'config_colums_editor_product_noibat') !!}</div>
                    </div>
                    <!--Portfolio Single End-->
                </div>
            </div>
        </section>
@endsection

@push('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-regis-demo").click(function (e) {
            e.preventDefault();
            var _token = $("#productRegisDemo input[name='_token']").val();
            var company = $("#productRegisDemo input[name='company']").val();
            var fullname = $("#productRegisDemo input[name='fullname']").val();
            var email = $("#productRegisDemo input[name='email']").val();
            var phone = $("#productRegisDemo input[name='phone']").val();
            var address = $("#productRegisDemo input[name='address']").val();
            var message = $("#productRegisDemo textarea[name='message']").val();
            var product = $("#productRegisDemo input[name='product_name']").val();
            $.ajax({
                url: "<?php echo route('contactFrontend.regisProductDemo') ?>",
                type: 'POST',
                data: {
                    _token: _token,
                    company: company,
                    fullname: fullname,
                    email: email,
                    phone: phone,
                    address: address,
                    product: product,
                    message: message
                },
                success: function (data) {
                    if (data.status == 200) {
                        $("#productRegisDemo .print-error-msg").css('display', 'none');
                        $("#productRegisDemo .print-success-msg").css('display', 'block');
                        $("#productRegisDemo .print-success-msg span").html("<?php echo $fcSystem['message_2'] ?>");
                        setTimeout(function () {
                            //location.reload();
                        }, 3000);
                    } else {
                        $("#productRegisDemo .print-error-msg").css('display', 'block');
                        $("#productRegisDemo .print-success-msg").css('display', 'none');
                        $("#productRegisDemo .print-error-msg span").html(data.error);
                    }
                }
            });
        });
    });
</script>
@endpush

@push('css')

@endpush