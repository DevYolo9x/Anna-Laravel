@extends('homepage.layout.home')
@section('content')
{!!htmlBreadcrumb($detail->title, $breadcrumb, showField($detail->fields, 'config_colums_input_category_article_banner'))!!}
<section class="news-one">
    <div class="container">
        <div class="row">
            @include('article.frontend.category.data')
        </div>
    </div>
</section>
@endsection