@extends('admin.layouts.header')
@section('content')
    <div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
        <h4 class="font-bold text-xl"> All tag </h4>
        <a href="{{ route('tags.create')}}" class="font-semibold text-amber-800"> Create New tag </a>
    </div>
    <div class="flex flex-col mt-1 md:mt-4 lg:mt-6 bg-white">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200/60 ">
                <thead class="text-left my-5 bg-slate-200/60">
                    <tr>
                        <th class="py-3"> Tag Name </th>
                        <th class="py-3"> Tag Image </th>
                        <th class="py-3 text-center"> Tag Slug </th>
                        <th class="py-3"> ACTIONS </th>
                    </tr>
                </thead>
                <tbody class="divide-y-8 divide-gray-200">
                    @foreach ($tags as $tag)
                    <tr class="my-3 bg-white mt-5">
                        <td class="text-left bg-white py-2">
                            {{ $tag->tag_name }}
                        </td>
                        <td class="text-left bg-white py-2">
                            <img class="w-10 h-10" src="{{ asset($tag->tag_img) }}" alt="{{ $tag->slug }}">
                        </td>
                        <td class="text-center bg-white py-2">
                            {{ $tag->slug }}
                        </td>
                        
                        <td class=" text-left bg-white py-2">
                            <a class="mr-3 text-gray-700" href="{{route('tags.edit',$tag->id)}}">
                                <i class="far fa-edit"></i>
                                Edit
                            </a>
                            <a class="mr-3 text-red-800 delete-confirm" href="{{route('tags.destroy',$tag->id)}}">
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
    <div class="my-10 lg:my-20">
        {{ $tags->links() }}
    </div>
    
@endsection