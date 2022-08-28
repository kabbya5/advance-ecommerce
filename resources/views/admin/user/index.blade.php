@extends('admin.layouts.header')
@section('content')
    @include('admin.user._users',['model' => $users,'delete_option' => 0,])
    
@endsection