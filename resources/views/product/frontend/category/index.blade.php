@extends('homepage.layout.home')
@section('content')
@include('product.frontend.category.data',['module' => $module, 'title' => $detail->title])
@endsection