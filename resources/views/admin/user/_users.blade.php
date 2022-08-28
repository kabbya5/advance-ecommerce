
<div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <a href="{{ route('users.index') }}" class="font-semibold  text-xl {{ (request()->is('admin/others/users')) ? 'text-amber-800' : '' }}"> All Users </a>
    <a href="{{ route('unverify.users')}}" class="font-semibold text-xl {{ (request()->is('admin/others/unverify/users')) ? 'text-amber-800' : '' }}"> Unverify Users  </a>
</div>
<div class="flex flex-col mt-1 md:mt-4 lg:mt-6 bg-white">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200/60 ">
            <thead class="text-left my-5 bg-slate-200/60">
                <tr>
                    <th class="py-3"> User Name </th>
                    <th class="py-3"> User Image </th>
                    <th class="py-3 text-center"> Created At </th>
                    <th class="py-3"> Email Verification </th>
                    <th class="py-3"> ACTIONS </th>
                </tr>
            </thead>
            <tbody class="divide-y-8 divide-gray-200">
                @foreach ($model as $user)
                <tr class="my-3 bg-white mt-5">
                    <td class="text-left bg-white py-2">
                        {{ $user->name }}
                    </td>
                    <td class="text-left bg-white py-2">
                        <img class="w-10 h-10" src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->slug }}">
                    </td>
                    <td class="text-center bg-white py-2">
                        {{ $user->created_at->format('M d Y') }}
                    </td>
                    @if($user->email_verified_at == null)
                    <td class="text-center bg-white py-2">
                        Null
                    </td>
                    @else
                    <td class="text-center bg-white py-2">
                        Ture
                    </td>
                    @endif
                    
                    <td class=" text-left bg-white py-2">
                        <a class="mr-3 text-gray-700" href="{{route('users.edit',$user->id)}}">
                            <i class="far fa-edit"></i>
                            Edit
                        </a>
                        @if ($delete_option == 1)
                        <a class="mr-3 text-red-800 delete-confirm" href="{{route('tags.destroy',$user->id)}}">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                        </a>
                        @endif 
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
    {{ $model->links() }}
</div>