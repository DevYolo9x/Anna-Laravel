<div id="main" class="sitemap main-category-child ">
    {!!htmlBreadcrumb($title, ($module != 'search' && $module != 'products') ? $breadcrumb : [] )!!}
    <div class="content-product py-[30px] md:py-[50px]">
        <div class="container mx-auto px-3">
            <div class="flex flex-wrap justify-between mx-[-15px]">
                {{-- @include('product.frontend.category.filter') --}}
                <div class="w-full md:w-9/12_ px-[15px] order-1 md:order-2">
                    <div class="box-item-product mb-[20px] md:mb-[30px]">
                        <div class="title-title border-b border-gray-200 pb-[10px]">
                            <h2 class="text-f20 md:text-f23 font-bold uppercase">{{ $title }}</h2>
                        </div>
                        <div class="nav-item-product mt-[30px]">
                            <div class="flex flex-wrap justify-start mx-[-10px]" id="js_data_product_filter">
                                @if(!empty($data) && count($data) > 0)
                                @foreach( $data as $item )
                                    <div class="w-1/2 md:w-1/4 px-[10px]">
                                        {!! htmlItemProduct($item) !!}
                                    </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="pagenavi js_pagination_filter wow fadeInUp mt-[20px] pb-[20px]">
                                {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
