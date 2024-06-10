<?php

namespace App\Http\Controllers\Service\backend;

use App\Components\Nestedsetbie;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Components\Helper;
use App\Components\Polylang;
use App\Models\CategoryService;
use App\Models\Tag;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    protected $Nestedsetbie;
    protected $Helper;
    protected $Polylang;
    protected $table = 'services';
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_services'));
        $this->Helper = new Helper();
        $this->Polylang = new Polylang();
    }
    public function index(Request $request)
    {
        $module = $this->table;
        $data =  Service::where(['alanguage' => config('app.locale'), 'type' => 0])
            ->with('user:id,name')
            ->with(['relationships' => function ($query) {
                $query->select('services_relationships.moduleid', 'category_services.title', 'category_services.id')
                    ->where('module', '=', $this->table)
                    ->join('category_services', 'category_services.id', '=', 'services_relationships.catalogueid');
            }])
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'DESC');
        $keyword = $request->keyword;
        $catalogueid = $request->catalogueid;
        $type = $request->type;
        if (!empty($keyword)) {
            $data =  $data->where($this->table . '.title', 'like', '%' . $keyword . '%');
        }
        if (!empty($type)) {
            $data =  $data->where($this->table . '.' . $type,  1);
        }
        $data = $data->join('services_relationships', $this->table . '.id', '=', 'services_relationships.moduleid')->where('services_relationships.module', '=', $this->table);
        if (!empty($catalogueid)) {
            $data =  $data->where('services_relationships.catalogueid', $catalogueid);
        }
        $data =  $data->select('services.id', 'services.image', 'services.title', 'services.slug', 'services.catalogue_id', 'services.userid_created', 'services.created_at', 'services.publish', 'services.order', 'services.ishome', 'services.highlight', 'services.isaside', 'services.isfooter');
        $data =  $data->groupBy('services_relationships.moduleid');
        $data =  $data->paginate(env('APP_paginate'));
        if (is($type)) {
            $data->appends(['type' => $type]);
        }
        if (is($keyword)) {
            $data->appends(['keyword' => $keyword]);
        }
        if (is($catalogueid)) {
            $data->appends(['catalogueid' => $catalogueid]);
        }
        $htmlOption = $this->Nestedsetbie->dropdown([], config('app.locale'));
        $configIs = \App\Models\Configis::select('title', 'type')->where(['module' => $this->table, 'active' => 1])->get();
        return view('service.backend.service.index', compact('data', 'module', 'htmlOption', 'configIs'));
    }
    public function create()
    {
        $dropdown = getFunctions();
        $module = $this->table;
        $htmlCatalogue = $this->Nestedsetbie->dropdown([], config('app.locale'));
        //tags
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        }
        // $tags = relationships('\App\Models\Tag', $getTags);
        //end tag
        $tags = Tag::select('id', 'title')->where('module', 'services')->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        $products = dropdown(\App\Models\Product::select('id', 'title')->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->get(), 'Chọn sản phẩm', 'id', 'title');
        $field = \App\Models\ConfigColum::where(['trash' => 0, 'publish' => 0, 'module' => $module])->get();
        return view('service.backend.service.create', compact('module', 'htmlCatalogue', 'tags', 'dropdown', 'getTags', 'field', 'products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'slug' => 'required|unique:router,slug,' . config('app.locale') . ',alanguage',
            'slug' =>  ['required', Rule::unique('router')->where(function ($query) use ($request) {
                return $query->where('alanguage', config('app.locale'));
            })],
            'catalogue_id' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn bài viết là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn bài viết đã tồn tại.',
            'catalogue_id.gt' => 'Danh mục là trường bắt buộc.',
        ]);
        if (!empty($request->file('image'))) {
            $image_url = uploadImageNone($request->file('image'), 'services');
        } else {
            $image_url = $request->image_old;
        }
        $this->submit($request, 'create', 0, $image_url);
        return redirect()->route('services.index')->with('success', "Thêm mới dự án thành công");
    }
    public function edit($id)
    {
        $dropdown = getFunctions();
        $module = $this->table;
        $detail  = Service::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('services.index')->with('error', "Dự án không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown([], config('app.locale'));
        //tags
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        } else {
            foreach ($detail->tags as $k => $v) {
                $getTags[] = $v['tag_id'];
            }
        }
        $tags = Tag::select('id', 'title')->where('module', 'services')->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        // $tags = relationships('\App\Models\Tag', $getTags);
        //end tag
        $getCatalogue = [];
        $getProduct = [];
        if (old('catalogue')) {
            $getCatalogue = old('catalogue');
        } else {
            $getCatalogue = json_decode($detail->catalogue);
        }
        if (old('products')) {
            $getProduct = old('products');
        } else {
            $getProduct = json_decode($detail->products);
        }
        $field = \App\Models\ConfigColum::where(['trash' => 0, 'publish' => 0, 'module' => $module])->get();
        $products = dropdown(\App\Models\Product::select('id', 'title')->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->get(), 'Chọn sản phẩm', 'id', 'title');
        return view('service.backend.service.edit', compact('module', 'detail', 'htmlCatalogue', 'tags', 'dropdown', 'getTags', 'getCatalogue', 'field', 'products', 'getProduct'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'slug' => 'required|unique:router,slug,' . $id . ',moduleid,alanguage,' . config('app.locale') . '',
            'slug' => ['required', Rule::unique('router')->where(function ($query) use ($id) {
                return $query->where('moduleid', '!=', $id)->where('alanguage', config('app.locale'));
            })],
            'catalogue_id' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'catalogue_id.gt' => 'Danh mục chính là trường bắt buộc.',
        ]);
        //upload image
        if (!empty($request->file('image'))) {
            $image_url = uploadImage($request->file('image'), 'services');
        } else {
            $image_url = $request->image_old;
        }
        //end
        $this->submit($request, 'update', $id, $image_url);
        return redirect()->route('services.index')->with('success', "Cập nhập dự án thành công");
    }
    public function submit($request = [], $action = '', $id = 0, $image_url = '')
    {
        if ($action == 'create') {
            $time = 'created_at';
            $user = 'userid_created';
        } else {
            $time = 'updated_at';
            $user = 'userid_updated';
        }
        //danh mục phụ
        $catalogue = $request['catalogue'];
        $tmp_catalogue[] = (int)$request['catalogue_id'];
        if (isset($catalogue)) {
            foreach ($catalogue as $v) {
                if ($v != 0 && $v != $request['catalogue_id']) {
                    $tmp_catalogue[] = (int)$v;
                }
            }
        }
        //lấy danh mục cha (nếu có)
        $detail = CategoryService::select('id', 'title', 'slug', 'lft')->where('id', $request['catalogue_id'])->first();
        $breadcrumb = CategoryService::select('id', 'title')->where('alanguage', config('app.locale'))->where('lft', '<=', $detail->lft)->where('rgt', '>=', $detail->lft)->orderBy('lft', 'ASC')->orderBy('order', 'ASC')->get();
        if ($breadcrumb->count() > 0) {
            foreach ($breadcrumb as $v) {
                $tmp_catalogue[] = $v->id;
            }
        }
        $tmp_catalogue = array_unique($tmp_catalogue);
        //end
        $_data = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'catalogue_id' => $request['catalogue_id'],
            'image' => $image_url,
            'description' => $request['description'],
            'content' => $request['content'],
            'catalogue' => json_encode($tmp_catalogue),
            'products' => json_encode($request['products']),
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'alanguage' => config('app.locale'),
        ];
        if ($action == 'create') {
            $id = Service::insertGetId($_data);
        } else {
            Service::find($id)->update($_data);
        }
        if (!empty($id)) {
            //xóa khi cập nhập
            if ($action == 'update') {
                //xóa bảng router
                DB::table('router')->where(['moduleid' => $id, 'module' => $this->table])->delete();
                //xóa catalogue_relationship
                DB::table('services_relationships')->where(['moduleid' => $id, 'module' => $this->table])->delete();
                //xóa tags_relationship
                DB::table('tags_relationships')->where(['module_id' => $id, 'module' => $this->table])->delete();
                //xóa custom fields
                DB::table('config_postmetas')->where(['module_id' => $id, 'module' => $this->table])->delete();
                $this->Polylang->insert($this->table, $request['language'], $id);
            }
            //thêm vào bảng catalogue_relationship
            $this->Helper->catalogue_service_relation_ship($id, $request['catalogue_id'], $tmp_catalogue, $this->table);
            //thêm tag
            $this->Helper->tags_relationships($id, $request['tags'], $this->table);
            //thêm router
            DB::table('router')->insert([
                'moduleid' => $id,
                'module' => $this->table,
                'slug' => $request['slug'],
                'created_at' => Carbon::now(),
                'alanguage' => config('app.locale'),
            ]);
            //START: custom fields
            fieldsInsert($this->table, $id, $request);
            //END
        }
    }
}
