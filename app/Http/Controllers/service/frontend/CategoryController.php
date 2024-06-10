<?php

namespace App\Http\Controllers\service\frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\CategoryService;
use Illuminate\Http\Request;
use App\Components\System;
use Cache;

class CategoryController extends Controller
{
    protected $paginate = 18;
    protected $system;
    public function __construct()
    {
        $this->system = new System();
    }
    public function index($slug = "", Request $request)
    {
        $segments = request()->segments();
        $slug = end($segments);
        $detail = CategoryService::select('id', 'slug', 'title', 'description', 'meta_description', 'meta_title', 'publish', 'lft', 'image', 'banner', 'ishome', 'highlight', 'isaside', 'isfooter', 'parentid')
            ->with('children')
            ->where('alanguage', config('app.locale'))
            ->where('publish', 0)
            ->where('slug', $slug)
            ->first();
        if (!isset($detail)) {
            return redirect()->route('homepage.index');
        }
        $data = \App\Models\Services_relationships::where(['catalogueid' => $detail->id, 'module' => 'services', 'services.publish' => 0])
            ->join('services', 'services.id', '=', 'services_relationships.moduleid')
            ->orderBy('services.id', 'desc');

        $view = 'service.frontend.category.index';
        $step = $service_1 = $service = $service_2 = [];
        if( $detail->type == 1 ){
            $view = 'service.frontend.category.service';
            $data = $data->get();
            $step = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'cp-four'])->with('slides')->first();
            $service_1 = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'service-1'])->with('slides')->first();
            $service_2 = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'service-2'])->with('slides')->first();
            $service = \App\Models\CategoryService::select('id', 'title', 'slug')
                ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'isservice' => 1])
                ->with(['posts' => function ($query) {
                    $query->limit(4)->get();
                }])->first();
        } else {
            $data = $data->paginate($this->paginate);
        }
        
        // breadcrumb
        $breadcrumb = CategoryService::select('title', 'slug')->where('alanguage', config('app.locale'))->where('lft', '<=', $detail->lft)->where('rgt', '>=', $detail->lft)->orderBy('lft', 'ASC')->orderBy('order', 'ASC')->get();
        $seo['canonical'] = route('routerURL', ['slug' => $slug]);
        $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
        $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail->description));
        $seo['meta_image'] = $detail['image'];
        $fcSystem = $this->system->fcSystem();
        $polylang = langURLFrontend('category_services', config('app.locale'), $detail->id, '\App\Models\CategoryService');
        if (!empty($polylang)) {
            foreach ($polylang as $key => $item) {
                $fcSystem['language_' . $key] = $item;
            }
        }
        return view($view, compact('fcSystem', 'detail', 'seo', 'data', 'breadcrumb', 'step', 'service_1', 'service_2', 'service'));
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $month = $request->month;
        $sort = '';
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        $data =  Service::select('id', 'title', 'description', 'image', 'slug', 'userid_created', 'created_at')->where(['alanguage' => config('app.locale'), 'publish' => 0]);
        if (!empty($keyword)) {
            $data =  $data->where('title', 'like', '%' . $keyword . '%');
        }
        if (!empty($month)) {
            $data =  $data->whereMonth('created_at', $month);
        }
        $data =  $data->orderBy('order', 'asc')->orderBy('id', 'desc');
        $data =  $data->paginate(12);
        if (is($keyword)) {
            $data->appends(['keyword' => $keyword]);
        }
        $seo['canonical'] = $request->url();
        $seo['meta_title'] =  "Search " . $keyword;
        $seo['meta_description'] = '';
        $seo['meta_image'] = '';
        $fcSystem = $this->system->fcSystem();
        return view('service.frontend.search.index', compact('fcSystem', 'seo', 'data'));
    }
    public function ajaxPagination(Request $request)
    {
        $id = $request->id;
        $data = \App\Models\Services_relationships::where(['catalogueid' => $id, 'module' => 'services', 'services.publish' => 0])
            ->join('services', 'services.id', '=', 'services_relationships.moduleid')
            ->orderBy('services.id', 'desc')
            ->paginate($this->paginate);
        return view('service.frontend.category.data', compact('data'))->render();
    }
}
