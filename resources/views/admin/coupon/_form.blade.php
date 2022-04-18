

<div class="bg-slate-200/60 w-full h-[30rem] flex items-center">
    <div class="mx-auto bg-white px-5 sm:px-8 py-8 xl:w-2/5 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4">
        <div class="bg-white border flex flex-col pl-4">
            <label for="coupon_name" class="py-2"> Coupon Name </label>
            <input type="text" name='coupon_name' value="{{ old('coupon_name',$model->coupon_name) }}"  class="@error('coupon_name') border border-red-500 @enderror pb-3">
        
            @error('coupon_name')
                <p class="text-sm text-red-500">{{ $message }}</p>  
            @enderror
            
            <label for="discount" class="py-2"> Coupon discoupn % </label>
            <input type="text" name='discount' value="{{ old('discount',$model->discount) }}"  
            `class="@error('discount') border border-red-500 @enderror pb-3">
        
            @error('discount')
                <p class="text-sm text-red-500">{{ $message }}</p>  
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="px-4 py-2 rounded-md bg-green-800 text-white mt-10"> {{ $button_text }}</button>
        </div>

    </div>

</div>


      
