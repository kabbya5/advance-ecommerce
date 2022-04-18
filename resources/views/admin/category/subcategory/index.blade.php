@extends('admin.layouts.header')
@section('content')
@include('admin.category._sheare._index',[
    'model' => $subcategories,
    'name' => 'subcat_name',
    'edit' => 'subcategories.edit',
    'delete' => 'subcategories.destroy',
    'child_cat' => 'Child Category',
    'model_relation' => 'childcategories',
])
@endsection