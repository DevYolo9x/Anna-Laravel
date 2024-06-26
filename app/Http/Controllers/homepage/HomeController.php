<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Components\Comment;
use App\Components\System;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Components\Nestedsetbie;
use App\Components\Helper;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    protected $comment;
    protected $system;
    protected $Nestedsetbie;
    protected $Helper;

    public function __construct()
    {
        $this->comment = new Comment();
        $this->system = new System();
        $this->Helper = new Helper();
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_products'));
    }
    public function index()
    {
        $fcSystem = $this->system->fcSystem();
        $slideHome = getSlide('slide-home-main');
        $slideAdv = getSlide('home-adv');

        $homeProduct = Cache::remember('homeProduct', 600, function () {
            $homeProduct = \App\Models\Product::select('id', 'title', 'slug', 'image', 'price', 'price_sale', 'description', 'catalogue_id')
            ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get();
            return $homeProduct;
        });

        $homeProductCategory = Cache::remember('homeProductCategory', 600, function () {
            $homeProductCategory = \App\Models\CategoryProduct::select('id', 'title', 'slug', 'image', 'banner', 'description')
                ->where(['alanguage' => config('app.locale'), 'ishome' => 1, 'publish' => 0])
                ->with([
                    'countProduct' => function($q) {
                        $q
                        ->join('products', 'products.id', '=', 'catalogues_relationships.moduleid')
                        ->where(['products.publish' => 0])
                        ->limit(20)
                        ->orderBy('products.order', 'asc')
                        ->orderBy('products.id', 'desc');
                    }])
                ->first();
                return $homeProductCategory;
        });

        $homeNews = Cache::remember('homeNews', 600, function () {
            $homeNews = \App\Models\CategoryArticle::select('id', 'title', 'slug')
            ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
            ->with(['posts' => function ($query) {
                $query->limit(20)->get();
            }])
            ->first();
            return $homeNews;
        });

        //page: HOME
        $page = Page::with('fields')->where(['alanguage' => config('app.locale'), 'page' => 'index', 'publish' => 0])->select('id', 'title', 'image', 'meta_title', 'meta_description')->first();
        $fields = [];
        if (!empty($page->fields) && count($page->fields) > 0) {
            foreach ($page->fields as $item) {
                $fields[$item->meta_key] = !empty($item->meta_value) ? json_decode($item->meta_value) : [];
            }
        }

        $module = 'home';

        $seo['canonical'] = url('/');
        $seo['meta_title'] = !empty($page['meta_title']) ? $page['meta_title'] : $page['title'];
        $seo['meta_description'] = !empty($page['meta_description']) ? $page['meta_description'] : '';
        $seo['meta_image'] = !empty($page['image']) ? url($page['image']) : '';
        return view('homepage.home.index', compact('page', 'module', 'seo', 'fcSystem', 'slideHome', 'slideAdv', 'homeNews', 'fields', 'homeProduct', 'homeProductCategory'));
    }

    public function sitemap()
    {
        /*
        $Tags = \App\Models\Tag::select('id', 'slug', 'created_at')->where('alanguage', config('app.locale'))->where('publish', 0)->get();
        $Brands = \App\Models\Brand::select('id', 'slug', 'created_at')->where('alanguage', config('app.locale'))->where('publish', 0)->get(); */
        $router = DB::table('router')->select('slug', 'created_at')->get();
        return response()->view('homepage.home.sitemap', compact('router'))->header('Content-Type', 'text/xml');
    }
    public function wishlist_index()
    {
        $wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'],TRUE) : NULL;

        if(!empty($wishlist)){
            $data = \App\Models\Product::select('products.id', 'products.title', 'products.image_json', 'products.image', 'products.slug', 'products.price', 'products.price_sale', 'products.price_contact')
                ->where(['products.alanguage' => config('app.locale'), 'products.publish' => 0])
                ->whereIn('products.id', $wishlist)
                ->orderBy('products.order', 'asc')
                ->orderBy('products.id', 'desc')
                ->with('getTags')
                ->get();
        }else{
            $data = [];
        }


        $fcSystem = $this->system->fcSystem();
        $seo['canonical'] = route('homepage.wishlist_index');
        $seo['meta_title'] = "Danh sách sản phẩm yêu thích";
        $seo['meta_description'] = "Danh sách sản phẩm yêu thích";
        return view('homepage.home.wishlist', compact('seo', 'fcSystem','data'));
    }
    public function wishlist(Request $request)
    {
        $wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'],TRUE) : NULL;
        $quantity = $wishlist ? count($wishlist) : 0;
        $productID = $request->id;
        if(!empty($wishlist)){
            if(in_array($request->id, $wishlist)){
                $filtered = collect($wishlist)->filter(function ($value, $key) use ($productID) {
                    return $value != $productID;
                });
                $quantity--;
                setcookie('wishlist', json_encode($filtered), time() + (86400 * 30), '/');
                return response()->json(['message'=>'Xóa sản phẩm khỏi Danh sách sản phẩm yêu thích thành công','status' => 400,'quantity' => $quantity]);
            }else{
                $cookie = collect($wishlist)->push($request->id)->all();
                $quantity++;
                setcookie('wishlist', json_encode($cookie), time() + (86400 * 30), '/');
                return response()->json(['message'=>'Thêm sản phẩm vào Danh sách sản phẩm yêu thích thành công','status' => 200,'quantity' => $quantity]);
            }
        }else{
            $quantity++;
            setcookie('wishlist', json_encode(array($request->id)), time() + (86400 * 30), '/');
            return response()->json(['message'=>'Thêm sản phẩm vào Danh sách sản phẩm yêu thích thành công','status' => 200,'quantity' => $quantity]);
        }
    }
}
