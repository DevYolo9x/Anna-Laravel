<?php $menu_product = getMenus('menu-product'); ?>
<div class="w-full md:w-3/12 px-[15px] order-2 md:order-1">
    <aside class="sidebar">

        @if( !empty($menu_product->menu_items) && count($menu_product->menu_items) > 0 )
        <div class="item-sidebar mb-[15px]">
            <h3 class="title-wd bg-color_primary p-[10px] text-white uppercase">
                {{ $menu_product->menu_items->first()->title }}
            </h3>
            <div class="nav-item-sidebar">
                @if( !empty($menu_product->menu_items->first()->children) && count($menu_product->menu_items->first()->children) > 0 )
                <ul class="border border-gray-100">
                    @foreach( $menu_product->menu_items->first()->children as $item )
                    <li class="border-b border-gray-100 p-[7px] px-[10px]">
                        <a href="{{ url($item->slug) }}" class="hover:opacity-80 transition-all">
                            <i class="fa-solid fa-angles-right mr-[5px] text-f11"></i>{{ $item->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        @endif

        @if( $module != 'search' && $module != 'products' )
            @if(!empty($attributes) && count($attributes) > 0)
                @foreach ($attributes as $key=>$item)
                    @if(count($item) > 0)
                        <div class="item-sidebar mb-[15px] border border-gray-200">
                            <h3 class="title-wd bg-color_primary p-[10px] text-white uppercase">
                                {{$key}}
                            </h3>
                            <div class="nav-item-sidebar p-[15px]">
                                <ul>
                                    @foreach ($item as $val)
                                        <label for="attr-{{$val['id']}}" class="js_attr block mb-2">
                                            <input id="attr-{{$val['id']}}" type="checkbox" value="{{$val['id']}}" data-title="{{$val['title']}}" data-keyword="{{$val['keyword']}}" class="js_input_attr filter" name="attr[]">
                                            <span class="ml-1">{{$val['title']}}</span>
                                            <div class="product-filter-tick">
                                                <svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold">
                                                    <g>
                                                        <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @endif
        <input id="choose_attr" class="w-full hidden" type="text" name="attr">
    </aside>
</div>

@push('javascript')
    <style>
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            text-indent: 1px;
            text-overflow: '';
        }
    </style>
    @include('product.frontend.category.script')
@endpush