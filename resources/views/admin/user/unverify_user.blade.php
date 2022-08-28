@extends('admin.layouts.header')
@section('content')
    @include('admin.user._users',
    [
        'model' => $unverify_users,
        'delete_option' => 1,
    ])
    
@endsection