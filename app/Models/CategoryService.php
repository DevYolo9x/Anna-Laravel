<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'parentid', 'description', 'image', 'image_json', 'type', 'isservice', 'meta_title', 'meta_description', 'userid_created', 'userid_updated', 'created_at', 'updated_at', 'publish', 'order', 'alanguage', 'banner'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }
    public function listService()
    {
        return $this->hasMany(Services_relationships::class, 'catalogueid')->where('module', '=', 'services');
    }
    public function services()
    {
        return $this->hasMany(Project::class, 'catalogue_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(CategoryProject::class, 'parentid', 'id')->select('id', 'title', 'slug', 'parentid')->orderBy('order', 'asc')->orderBy('id', 'desc');
    }
    public function posts()
    {
        return $this->hasMany(Services_relationships::class, 'catalogueid')->where('module', '=', 'services')
            ->join('services', 'services.id', '=', 'services_relationships.moduleid')
            ->where(['services.publish' => 0])
            ->select('services.id', 'services.title', 'services.slug', 'services.description', 'services.image', 'services.created_at', 'services_relationships.catalogueid')
            ->orderBy('services.order', 'asc')->orderBy('services.id', 'desc');
    }
    public function postsFields()
    {
        return $this->hasMany(Services_relationships::class, 'catalogueid')->where('services_relationships.module', '=', 'services')
            ->join('services', 'services.id', '=', 'services_relationships.moduleid')
            ->join('config_postmetas', 'services_relationships.moduleid', '=', 'config_postmetas.module_id')
            ->where(['services.publish' => 0, 'config_postmetas.module' => 'services'])
            ->select('services.id', 'services.title', 'services.slug', 'services.image', 'services_relationships.catalogueid', 'config_postmetas.meta_value')
            ->orderBy('services.order', 'asc')->orderBy('services.id', 'desc');
    }
}
