<?php

namespace App\Http\Controllers\service\frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cache;
use App\Components\Comment;
use App\Components\System;

class serviceController extends Controller
{
    protected $comment;
    protected $system;
    public function __construct()
    {
        $this->comment = new Comment();
        $this->system = new System();
    }
    public function index($slug = "")
    {
        $segments = request()->segments();
        $slug = end($segments);
        $detail = Service::select()
            ->where(['slug' => $slug, 'alanguage' => config('app.locale'), 'publish' => 0])
            ->with('catalogues')
            ->first();
        if (!isset($detail)) {
            return redirect()->route('homepage.index');
        }
        $catalogues = $detail->catalogues;
        // breadcrumb
        $breadcrumb = CategoryService::select('title', 'slug')->where('alanguage', config('app.locale'))->where('lft', '<=', $catalogues->lft)->where('rgt', '>=', $catalogues->lft)->orderBy('lft', 'ASC')->orderBy('order', 'ASC')->get();
        //bài viết liên quan
        $sameService =  Service::select('id', 'title', 'slug', 'image', 'description',  'services.created_at')->where('alanguage', config('app.locale'))->where('services_relationships.catalogueid', $catalogues->id)->where('services_relationships.moduleid', '!=', $detail['id'])->where('services.publish', 0)->orderBy('order', 'ASC')->orderBy('id', 'DESC');
        $sameService = $sameService->join('services_relationships', 'services.id', '=', 'services_relationships.moduleid')->where('services_relationships.module', '=', 'services');
        $sameService =  $sameService->groupBy('services_relationships.moduleid');
        $sameService =  $sameService->limit(4)->get();
        //cập nhập lượt xem
        DB::table('services')->where('id', '=', $detail['id'])->update([
            'viewed' => $detail['viewed'] + 1,
        ]);
        //lấy comment
        $comment_view =  $this->comment->comment(array('id' => $detail->id, 'sort' => 'id'), 'services');
//        $previous = Service::select('id', 'slug', 'title')->where('id', '<', $detail->id)->where('alanguage', config('app.locale'))->where('catalogue_id', $detail->catalogue_id)->first();
//        $next = Service::select('id', 'slug', 'title')->where('id', '>', $detail->id)->where('alanguage', config('app.locale'))->where('catalogue_id', $detail->catalogue_id)->first();
        $fcSystem = $this->system->fcSystem();
        $seo['canonical'] = route('routerURL', ['slug' => $slug]);
        $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
        $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail->description));
        $seo['meta_image'] = $detail['image'];
        $fcSystem = $this->system->fcSystem();
        $module = 'services';
        $polylang = langURLFrontend($module, config('app.locale'), $detail->id, '\App\Models\Service');
        if (!empty($polylang)) {
            foreach ($polylang as $key => $item) {
                $fcSystem['language_' . $key] = $item;
            }
        }
        $view = 'service.frontend.service.index';
        if( $catalogues['type'] == 1 ){
            $view = 'service.frontend.service.service';
        }
        return view($view, compact('module', 'fcSystem', 'detail', 'seo', 'breadcrumb', 'sameService', 'catalogues', 'comment_view'));
    }
}
