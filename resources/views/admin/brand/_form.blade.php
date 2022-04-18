<div class="bg-slate-200/60 w-full h-[30rem] flex items-center">
    <div class="mx-auto bg-white px-5 sm:px-8 py-8 xl:w-2/5 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4">
        <div class="bg-white border flex flex-col pl-4">
            <label for="name" class="py-2"> Brand Name </label>
            <input type="text" name='name' value="{{ old('name',$model->name) }}" class="pb-3 h-10 @error('name') border border-red-500 @enderror">
            @error('name')
                <p class="text-sm text-red-500"> {{ $message }}</p>
            @enderror

            <label for="brand_img" class="py-2"> Brand Image </label>
            <input type="file" name='brand_img'  class="@error('brand_img') border border-red-500 @enderror pb-3">
            <input type="hidden" name="old_brand_img" value="{{ $model->brand_img }}">
            <img src="{{ asset($model->brand_img) }}" alt="{{ $model->brand_img_name }}" class="h-40">
            @error('brand_img')
                <p class="text-sm text-red-500">{{ $message }}</p>  
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="px-4 py-2 rounded-md bg-green-800 text-white mt-10"> {{ $button_text }}</button>
        </div>
    </div>
</div>

      
