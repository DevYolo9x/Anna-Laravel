<?php

if (!function_exists('svl_ismobile')) {

    function svl_ismobile()
    {
        $tablet_browser = 0;
        $mobile_browser = 0;

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-'
        );

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }

        if ($tablet_browser > 0) {
            // do something for tablet devices
            return 'is tablet';
        } else if ($mobile_browser > 0) {
            // do something for mobile devices
            return 'is mobile';
        } else {
            // do something for everything else
            return 'is desktop';
        }
    }
}
if (!function_exists('getImageUrl')) {
    function getImageUrl($module = '', $src = '', $type = '')
    {
        $path  = '';
        $dir = explode("/", $src);
        $file = collect($dir)->last();
        if (svl_ismobile() == 'is mobile') {
            $path = 'upload/.thumbs/images/' . $module . '/' . $type . '/' . $file;
        } else if (svl_ismobile() == 'is tablet') {
            $path = 'upload/.thumbs/images/' . $module . '/' . $type . '/' . $file;
        } else if (svl_ismobile() == 'is desktop') {
            $path = 'upload/.thumbs/images/' . $module . '/' . $type . '/' . $file;
        } else {
            $path = $src;
        }
        if (File::exists(base_path($path))) {
            $path = $path;
        } else {
            $path = $src;
        }
        return asset($path);
    }
}
if (!function_exists('getFunctions')) {
    function getFunctions()
    {
        $data = [];
        $getFunctions = \App\Models\Permission::select('title')->where('publish', 0)->where('parent_id', 0)->get()->pluck('title');
        if (!$getFunctions->isEmpty()) {

            foreach ($getFunctions as $v) {
                $data[] = $v;
            }
        }
        return $data;
    }
}
if (!function_exists('getUrlHome')) {
    function getUrlHome()
    {
        return !empty(config('app.locale') == 'vi') ? url('/') : url('/en');
    }
}
/**HTML: Breadcrumb */
if (!function_exists('htmlBreadcrumb')) {
    function htmlBreadcrumb($title = '', $breadcrumb = [], $banner = '')
    {
        $html = '';
        if( isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb) ) {
            $html .= '<section class="page-header">
                    <div class="page-header-bg" style="background-image: url('.$banner.')">
                    </div>
                    <div class="page-header-shape-1"><img src="'. asset('frontend/images/page-header-shape-1.png') .'" alt="shape"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="'.url('/').'">'. trans('index.home') .'</a></li>';
                                foreach( $breadcrumb as $k => $v ) {
                                    $html .= '<li><span>/</span></li>
                                                <li>'.$v['title'].'</li>';
                                }
                    $html .= '</ul>
                            <h2>Contact</h2>
                        </div>
                    </div>
                </section>';
        } else {
            $html .= '<section class="page-header">
                    <div class="page-header-bg" style="background-image: url('.$banner.')">
                    </div>
                    <div class="page-header-shape-1"><img src="'. asset('frontend/images/page-header-shape-1.png') .'" alt="shape"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="'.url('/').'">'. trans('index.home') .'</a></li>
                                <li><span>/</span></li>
                                <li>'.$title.'</li>
                            </ul>
                            <h2>'.$title.'</h2>
                        </div>
                    </div>
                </section>';
        }
        
        return $html;
    }
}
if (!function_exists('htmlArticle')) {
    function htmlArticle($item = [])
    {
        $html = '';
        $html .= '<div class="mb-[50px] px-[10px]">
             <div class=" h-full flex flex-col space-y-2">
                <div class="img hover-zoom flex-shrink-0 zoom-effect overflow-hidden">
                    <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="relative">
                        <img src="' . asset($item['image']) . '" alt="' . $item['title'] . '" class="w-full object-cover md:h-[190px]" />
                    </a>
                </div>
                 <div class="flex-1 flex flex-col justify-between space-y-1.5">
                    <h3 class="title-2 text-f15 md:text-base font-black  clamp-3">
                        <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="text-base leading-[1.1] transition-all hover:text-primary">' . $item['title'] . '</a>
                    </h3>
                    <div class="flex items-center text-sm text-[#999]">
                        <span class="flex items-center space-x-1">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>
                                ' . $item['created_at'] . '
                            </span>
                        </span>
                    </div>
                    <div class="clamp clamp-3 text-[#757575]">
                        ' . strip_tags($item['description']) . '
                    </div>
                    <div>
                        <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="font-bold tracking-wider uppercase text-f13">Xem thêm ...</a>
                    </div>
                 </div>
             </div>
         </div>';
        return $html;
    }
}
if (!function_exists('htmlAddress')) {
    function htmlAddress($data = [])
    {
        $html = '';
        if (isset($data)) {
            foreach ($data as $k => $v) {
                $html .= ' <li class="showroom-item loc_link result-item" data-brand="' . $v->title . '"
    data-address="' . $v->address . '" data-phone="' . $v->hotline . '" data-lat="' . $v->lat . '"
    data-long="' . $v->long . '">
    <div class="heading" style="display: flex">

        <p class="name-label" style="flex: 1">
            <strong>' . ($k + 1) . '. ' . $v->title . '</strong>
        </p>
    </div>
    <div class="details">
        <p class="address" style="flex:1"><em>' . $v->address . '</em>
        </p>

        <p class="button-desktop button-view hidden-xs">
            <a href="javascript:void(0)" onclick="return false;">Tìm đường</a>
            <a class="arrow-right"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
        </p>
        <p class="button-mobile button-view visible-xs">
            <a target="_blank" href="https://www.google.com/maps/dir//' . $v->lat . ',' . $v->long . '">Tìm đường</a>
            <a class="arrow-right" target="_blank"
                href="https://www.google.com/maps/dir//' . $v->lat . ',' . $v->long . '"><span><i
                        class="fa fa-angle-right" aria-hidden="true"></i></span></a>
        </p>
    </div>
</li>';
            }
        }
        return $html;
    }
}

/**HTML: item sản phẩm */
if (!function_exists('htmlItemProduct')) {
    function htmlItemProduct( $item = [], $class = 'item item-product')
    {
        $wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'],TRUE) : NULL;
        $i_class = 'fa-regular';
        if(!empty($wishlist)){
            if(in_array($item['id'], $wishlist)){
                $i_class = 'fa-solid';
            }
        }
        $html = '';
        $price = getPrice(array('price' => $item['price'], 'price_sale' => $item['price_sale'], 'price_contact' =>
        $item['price_contact']));
        $route = route('routerURL', ['slug' => $item['slug']]);
        $image = asset($item['image']);
        $title = $item['title'];
        $code = $item['code'];

        if (!empty($item['image_json'])) {
            $listAlbums = json_decode($item['image_json'], true);
            if (count($listAlbums) < 2) {
                $listAlbums = [$item['image'], $item['image']];
            }
        } else {
            $listAlbums = [$item['image'], $item['image']];
        }
        $html .= '<div class="item-product border border-gray-200 mb-[10px] md:mb-[20px]">
                    <div class="img hover-zoom">
                        <a href="'.$route.'"><img src="'.$image.'" alt="'.$title.'" class="w-full"></a>
                    </div>
                    <div class="nav-item-product p-[15px]">
                        <h3 class="text-f17 font-bold" style=" overflow: hidden;text-overflow: ellipsis;line-height: 20px;-webkit-line-clamp: 2;height: 40px; display: -webkit-box;-webkit-box-orient: vertical;">
                        <a href="'.$route.'" class="transition-all hover:text-color_primary">'.$title.'</a></h3>
                        <p class="desc text-gray-600 text-f14 mt-[5px] mb-[5px] hide hidden">'.$code.'</p>
                        <p class="price text-red-600 font-bold text-f17">'.$price['price_final'].'</p>
                    </div>
                </div>';
        return $html;
    }
}

/**HTML: item sản phẩm bán kèm */
if (!function_exists('htmlItemProductUpSell')) {
    function htmlItemProductUpSell($item = [])
    {
        $html = '';
        $price = getPrice(array('price' => $item['price'], 'price_sale' => $item['price_sale'], 'price_contact' => $item['price_contact']));
        $href = route('routerURL', ['slug', $item['slug']]);
        $img = !empty($item['image']) ? $item['image'] : 'images/404.png';
        $title = $item['title'];

        $html .= '<div class="product-item text-center pd-2 mb-6" style="border-bottom: 1px solid #ddd">
                    <div class="box-image">
                        <a href="' . $href . '"><img src="' . $img . '" alt="' . $title . '" height="90" width="90" style="display: inline-block;object-fit: contain"></a>
                    </div>
                    <div class="box-text pt-2 pb-2">
                        <a href="' . $href . '">
                            <h4 class="title-product text-f15">
                                ' . $title . '
                            </h4>
                        </a>
                    </div>
                    <div class="box-price pb-2">
                        <span class="text-red extraPriceFinal text-f16 text-red-600 font-bold">' . $price['price_final'] . '</span>
                        <del class="ml-[5px] extraPriceOld text-f14">' . $price['price_old'] . '</del>
                    </div>
                    <div class="box-action pb-5">
                        <a href="javascript:void(0)" class="addToCartDeals text-f15 text-blue-700">+ Thêm vào giỏ</a>
                    </div>
                </div>';
        return $html;
    }
}
