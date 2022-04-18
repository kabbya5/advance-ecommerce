<div class="bg-slate-200/60 col-span-12 overflow-auto lg:overflow-visible my-5">
    <div class="flex justify-around bg-white py-4 border ">
        <div class="">
            <a href="{{ route('categories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All Category </a>
        </div>
        <div class="flex flex-col md:flex-row">
            <a href="{{ route('subcategories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All SubCategory </a>
            <a href="{{ route('childcategories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All ChildCategory </a>
        </div> 
    </div>
    <div class="flex flex-col mt-1 md:mt-4 lg:mt-6 bg-white">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200/60 ">
                <thead class="text-left my-5 bg-slate-200/60">
                    <tr>
                        <th class="py-3"> Sl.No </th>
                        <th class="py-3">Cateory Name </th>
                        <th class="py-3 text-center"> {{ $child_cat}} </th>
                        <th class="py-3"> ACTIONS </th>
                    </tr>
                </thead>
                <tbody class="divide-y-8 divide-gray-200">
                    @foreach ($model as $key => $cat)
                    <tr class="my-3 bg-white mt-5">
                        <td class="w-40 text-left bg-white py-2">
                            {{ $cat->category->cat_name }}
                        </td>
                        <td class="w-40 text-left bg-white py-2">
                            {{ $cat->$name }}
                        </td>
                        <a href="" class="text-center"> <td class="text-center transition duration-300 hover:bg-slate-300"> {{ count($cat->$model_relation) }}</td> </a>
                        
                        <td class="flex w-40 text-left bg-white py-2">
                            <a class="mr-3 text-gray-700" href="{{route($edit,$cat->id)}}">
                                <i class="far fa-edit"></i>
                                Edit
                            </a>
                            <form action="{{route($delete,$cat->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="text-red-600"> <i class="fas fa-trash"> </i>  Delete </button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="flex justify-around bg-white py-4 border mt-1 md:mt-8 ">
        <div class="">
            <a href="{{ route('categories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create Category </a>
        </div>
        <div class="flex flex-col md:flex-row">
            <a href="{{ route('subcategories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create SubCategory </a>
            <a href="{{ route('childcategories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create ChildCategory </a>
        </div> 
    </div>
</div>