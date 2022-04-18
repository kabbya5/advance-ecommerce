
<div class="grid gird-cols-1 lg:grid-cols-2 gap-4">
    <div class="col-span-1 bg-white border flex flex-col pl-4">
        <label for="slider_name" class="py-2"> Upload Image  </label>
        <input type="file" name='img_1' class="@error('img_1') border border-red-500 @enderror pb-3">
        <input type="hidden" name="old_img_1" value="{{ $model->img_1 }}">
        @error('img_1')
            <p class="text-sm text-red-500">{{ $message }}</p>                    
        @enderror
        <img src="{{ asset($model->img_1) }}" alt="{{ $model->img_1_name }}">
    </div>

    <div class="col-span-1 bg-white border flex flex-col pl-4">
        <label for="slider_name" class="py-2">image 1 Name  </label>
        <input type="text" name='slider_name' value="{{ old('slider_name',$model->slider_name) }}" class="pb-3 h-10">
    </div>

    <div class="col-span-1 bg-white border flex flex-col pl-4">
        <label for="img_2" class="py-2"> Upload Image (Small Device) </label>
        <input type="file" name='img_2'  class="@error('img_2') border border-red-500 @enderror pb-3">
        <input type="hidden" name="old_img_2" value="{{ $model->img_2 }}">
        <img src="{{ asset($model->img_2) }}" alt="{{ $model->img_2_name }}" class="h-40">
        @error('img_2')
            <p class="text-sm text-red-500">{{ $message }}</p>  
        @enderror
    </div>
</div>
<div class="text-center">
    <button type="submit" class="px-4 py-2 rounded-md bg-green-800 text-white mt-10"> {{ $button_text }}</button>
</div>
      
