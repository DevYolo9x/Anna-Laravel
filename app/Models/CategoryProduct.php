<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description', 'image_json', 'parentid', 'image', 'meta_title', 'meta_description', 'userid_created', 'created_at', 'publish', 'alanguage', 'ishome', 'isaside', 'isfooter', 'highlight', 'icon', 'banner'

    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }
    public function children()
    {
        return $this->hasMany(CategoryProduct::class, 'parentid');
    }
    public function countProduct()
    {
        return $this->hasMany(Catalogues_relationships::class, 'catalogueid', 'id')->where('module', '=', 'products');
    }
    public function posts()
    {
        return $this->hasMany(Catalogues_relationships::class, 'catalogueid')
            ->join('products', 'products.id', '=', 'catalogues_relationships.moduleid')
            ->join('category_products', 'products.catalogue_id', '=', 'category_products.id')
            ->where(['products.publish' => 0, 'module' => 'products'])
            ->select('category_products.title as category_title', 'products.image_json', 'catalogues_relationships.moduleid', 'products.id', 'products.code', 'products.title', 'products.slug', 'products.image', 'products.price', 'products.price_sale', 'products.price_contact', 'catalogues_relationships.catalogueid')
            ->orderBy('products.price', 'desc')->orderBy('products.price_sale', 'desc')->orderBy('products.id', 'desc')
            ->with('getTags')->limit(10);
    }

    public function brands_relationships()
    {
        return $this->hasMany(Brands_relationships::class, 'category_product_id')->select('category_product_id', 'brand_id')->groupBy('brand_id')->with('brands');
    }
    public function attributes_relationships()
    {
        return $this->hasMany(Attributes_relationships::class, 'category_product_id')->select('category_product_id', 'attribute_id')->groupBy('attribute_id')->with('attributes');
    }
    public function fields()
    {
        return $this->hasMany(ConfigPostmeta::class, 'module_id')->where(['module' => 'category_products'])->select('module_id', 'meta_key', 'meta_value');
    }
}
