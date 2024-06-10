<?php

namespace App\Http\Controllers\project\frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\CategoryProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cache;
use App\Components\Comment;
use App\Components\System;

class ProjectController extends Controller
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
        $detail = Project::select()
            ->where(['slug' => $slug, 'alanguage' => config('app.locale'), 'publish' => 0])
            ->with('catalogues')
            ->first();
        if (!isset($detail)) {
            return redirect()->route('homepage.index');
        }
        $catalogues = $detail->catalogues;
        // breadcrumb
        $breadcrumb = CategoryProject::select('title', 'slug')->where('alanguage', config('app.locale'))->where('lft', '<=', $catalogues->lft)->where('rgt', '>=', $catalogues->lft)->orderBy('lft', 'ASC')->orderBy('order', 'ASC')->get();
        //bài viết liên quan
        $sameProject =  Project::select('id', 'title', 'slug', 'image', 'description',  'projects.created_at')->where('alanguage', config('app.locale'))->where('projects_relationships.catalogueid', $catalogues->id)->where('projects_relationships.moduleid', '!=', $detail['id'])->where('projects.publish', 0)->orderBy('order', 'ASC')->orderBy('id', 'DESC');
        $sameProject = $sameProject->join('projects_relationships', 'projects.id', '=', 'projects_relationships.moduleid')->where('projects_relationships.module', '=', 'projects');
        $sameProject =  $sameProject->groupBy('projects_relationships.moduleid');
        $sameProject =  $sameProject->limit(4)->get();
        //cập nhập lượt xem
        DB::table('projects')->where('id', '=', $detail['id'])->update([
            'viewed' => $detail['viewed'] + 1,
        ]);
        //lấy comment
        $comment_view =  $this->comment->comment(array('id' => $detail->id, 'sort' => 'id'), 'projects');
//        $previous = Project::select('id', 'slug', 'title')->where('id', '<', $detail->id)->where('alanguage', config('app.locale'))->where('catalogue_id', $detail->catalogue_id)->first();
//        $next = Project::select('id', 'slug', 'title')->where('id', '>', $detail->id)->where('alanguage', config('app.locale'))->where('catalogue_id', $detail->catalogue_id)->first();
        $fcSystem = $this->system->fcSystem();
        $seo['canonical'] = route('routerURL', ['slug' => $slug]);
        $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
        $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail->description));
        $seo['meta_image'] = $detail['image'];
        $fcSystem = $this->system->fcSystem();
        $module = 'projects';
        $polylang = langURLFrontend($module, config('app.locale'), $detail->id, '\App\Models\Project');
        if (!empty($polylang)) {
            foreach ($polylang as $key => $item) {
                $fcSystem['language_' . $key] = $item;
            }
        }
        $view = 'project.frontend.project.index';
        if( $catalogues['type'] == 1 ){
            $view = 'project.frontend.project.service';
        }
        return view($view, compact('module', 'fcSystem', 'detail', 'seo', 'breadcrumb', 'sameProject', 'catalogues', 'comment_view'));
    }
}
