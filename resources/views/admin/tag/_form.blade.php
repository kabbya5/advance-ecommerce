
<div class="bg-slate-200/60 w-full h-[30rem] flex items-center">
    <div class="mx-auto bg-white px-5 sm:px-8 py-8 xl:w-2/5 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4">
        <div class="bg-white border flex flex-col pl-4">
            <label for="tag_name" class="py-2">  Tag Name </label>
            <input type="text" name='tag_name' value="{{ old('tag_name',$model->tag_name) }}"  class="@error('tag_name') border border-red-500 @enderror pb-3">
            @error('tag_name')
                <p class="text-sm text-red-500">{{ $message }}</p>  
            @enderror

            <label for="tag_img" class="py-2"> Upload Tag Image </label>
            <input type="file" name='tag_img'  class="@error('tag_img') border border-red-500 @enderror pb-3">
            <input type="hidden" name="old_tag_img" value="{{ $model->tag_img }}">
            <img src="{{ asset($model->tag_img) }}" alt="{{ $model->slug }}" class="w-20 h-20">
            @error('tag_img')
                <p class="text-sm text-red-500">{{ $message }}</p>  
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="px-4 py-2 rounded-md bg-green-800 text-white mt-10"> {{ $button_text }}</button>
        </div>
    </div>
</div>


      
