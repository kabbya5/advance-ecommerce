@extends('admin.layouts.header')
@section('content')
    <div class="flex py-5 xl:py-0 my-10 xl:my-0 xl:bg-white">
        <div class="my-auto mx-auto bg-white sm:px-8 py-8 xl:p-0 rounded-md shadow-md w-full sm:w-3/4">
            <h2 class="font-bold text-2xl xl:text-3xl text-center">  Delivery System  <a href="{{ route('delivery_charge.create') }}"> new </a> </h2>
            <div class="mt-8">
                <table class="table-auto w-full">
                    <thead>
                      <tr class="bg-slate-200/60" align="left">
                        <th>Delivery Maggess </th>
                        <th>Delivery Charge </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody class="mt-5">
                        @foreach ($charges as $charge)
                        <tr>
                            <td>{{ $charge->text }}</td>
                            <td>{{ $charge->charge}}</td>
                            <td> <a class="mr-3 text-gray-700" href="{{route('delivery_charge.edit',$charge->id)}}">
                                <i class="far fa-edit"></i>
                                Edit
                            </a>
                            <a class="mr-3 text-red-800 delete-confirm" href="">
                                <i class="fa-solid fa-trash"></i>
                                Delete
                            </a></td>
                        </tr>   
                        @endforeach
                    </tbody>
                  </table> 
            </div>
        </div>
    </div>
@endsection