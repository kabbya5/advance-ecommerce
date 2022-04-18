@extends('admin.layouts.header')
@section('content')
    <div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
        <h4 class="font-bold text-xl"> All Slider </h4>
        <a href="{{ route('sliders.create')}}" class="font-semibold text-amber-800"> Create New Slider </a>
    </div>
    <div class="flex flex-col mt-1 md:mt-4 lg:mt-6 bg-white">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200/60 ">
                <thead class="text-left my-5 bg-slate-200/60">
                    <tr>
                        <th class="py-3"> slider image </th>
                        <th class="py-3"> Small device Image </th>
                        <th class="py-3 text-center"> Products </th>
                        <th class="py-3"> Status </th>
                        <th class="py-3"> ACTIONS </th>
                    </tr>
                </thead>
                <tbody class="divide-y-8 divide-gray-200">
                    @foreach ($sliders as $slider)
                    <tr class="my-3 bg-white mt-5">
                        <td class="text-left bg-white py-2">
                            <img class="w-20 h-20" src="{{ asset($slider->img_1) }}" alt="{{ $slider->img_1_name }}">
                        </td>
                        <td class="text-left bg-white py-2">
                            <img class="w-20 h-20" src="{{ asset($slider->img_2) }}" alt="{{ $slider->img_2_name }}">
                        </td>
                        <td class="text-center bg-white py-2">
                             {{count($slider->products) }}
                        </td>
                        <td>
                            <a href="{{ route('sliders.status',$slider->id)}}" 
                                class="px-3 py-2 text-white 
                                {{ ($slider->status == 1) ? 'bg-green-800' : 'bg-red-800' }}">
                                {{ $slider->active_status }}
                            </a>
                        </td>
                        <td class=" text-left bg-white py-2">
                            <a class="mr-3 text-gray-700" href="{{route('sliders.edit',$slider->id)}}">
                                <i class="far fa-edit"></i>
                                Edit
                            </a>
                            <a class="mr-3 text-red-800 delete-confirm" href="{{route('sliders.destroy',$slider->id)}}">
                                <i class="fa-solid fa-trash"></i>
                                Delete
                            </a>   
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection