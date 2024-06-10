<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'parentid', 'description', 'image', 'image_json', 'type', 'isservice', 'meta_title', 'meta_description', 'userid_created', 'userid_updated', 'created_at', 'updated_at', 'publish', 'order', 'alanguage', 'banner'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }
    public function listProject()
    {
        return $this->hasMany(Projects_relationships::class, 'catalogueid')->where('module', '=', 'projects');
    }
    public function projects()
    {
        return $this->hasMany(Project::class, 'catalogue_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(CategoryProject::class, 'parentid', 'id')->select('id', 'title', 'slug', 'parentid')->orderBy('order', 'asc')->orderBy('id', 'desc');
    }
    public function posts()
    {
        return $this->hasMany(Projects_relationships::class, 'catalogueid')->where('module', '=', 'projects')
            ->join('projects', 'projects.id', '=', 'projects_relationships.moduleid')
            ->where(['projects.publish' => 0])
            ->select('projects.id', 'projects.title', 'projects.slug', 'projects.description', 'projects.image', 'projects.created_at', 'projects_relationships.catalogueid')
            ->orderBy('projects.order', 'asc')->orderBy('projects.id', 'desc');
    }
    public function postsFields()
    {
        return $this->hasMany(Projects_relationships::class, 'catalogueid')->where('projects_relationships.module', '=', 'projects')
            ->join('projects', 'projects.id', '=', 'projects_relationships.moduleid')
            ->join('config_postmetas', 'projects_relationships.moduleid', '=', 'config_postmetas.module_id')
            ->where(['projects.publish' => 0, 'config_postmetas.module' => 'projects'])
            ->select('projects.id', 'projects.title', 'projects.slug', 'projects.image', 'projects_relationships.catalogueid', 'config_postmetas.meta_value')
            ->orderBy('projects.order', 'asc')->orderBy('projects.id', 'desc');
    }
}
