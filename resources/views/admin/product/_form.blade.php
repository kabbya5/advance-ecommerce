<div class="grid grid-cols-12 gap-4 bg-white mt-8">
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="form-group flex flex-col">
            <label for="product_name" class="pb-2"> Product Name </label>
            <input type="text" name="product_name" id="product_name" value="{{ old('product_name',$product->product_name)}}" class="w-96 mb-2 h-10 @error('product_name') border border-red-500 @enderror">
            @error('product_name')
                <p class="text-red-500"> {{ $message }}</p>
            @enderror  
        </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="form-group flex flex-col">
            <label for="product_code" class="pb-2"> Product Code </label>
            <input type="text" name="product_code" id="product_code" value="{{ old('product_code',$product->product_code)}}" placeholder="product_code" class="w-96 mb-2 h-10 @error('product_code') border border-red-500 @enderror">
            @error('product_code')
                <p class="text-red-500"> {{ $message }}</p>
            @enderror  
        </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="flex">
            <div class="form-group flex flex-col">
                <label for="size" class="pb-2"> Product Size </label>
                <input type="text" name="size" id="size" value="{{ old('size',$product->size)}}"  class="mb-2 h-10 @error('size') border border-red-500 @enderror" data-role="tagsinput" />
                @error('size')
                    <p class="text-red-500"> {{ $message }}</p>
                @enderror  
            </div>
            <div class="form-group flex flex-col">
                <label for="color" class="pb-2"> Product Color </label>
                <input type="text" name="color" id="color" value="{{ old('color',$product->color)}}" class="mb-2 h-10 @error('color') border border-red-500 @enderror" data-role="tagsinput" />
                @error('color')
                    <p class="text-red-500"> {{ $message }}</p>
                @enderror  
            </div>
        </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="form-group flex justify-between w-96">
            <div class="form-group flex flex-col w-1/2">
                <label for="selling_price" class="pb-2"> Selling Price </label>
                <input type="text" name="selling_price" id="selling_price" value="{{ old('selling_price',$product->selling_price)}}" placeholder="Product selling_price" class="mb-2 h-10 @error('selling_price') border border-red-500 @enderror">
                @error('selling_price')
                    <p class="text-red-500"> {{ $message }}</p>
                @enderror  
            </div>
            <div class="flex flex-col w-1/2">
                <label for="discount_price" class="pb-2"> Discount Price </label>
                <input type="text" name="discount_price" id="discount_price" value="{{ old('selling_price',$product->discount_price)}}" placeholder="Product discount_price" class="mb-2 h-10"> 
            </div>
        </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="form-group flex justify-between">
            <div class="form-group flex flex-col">
                <label for="product_quantity" class="pb-2"> Product Quantity </label>
                <input type="text" name="product_quantity" id="product_quantity" value="{{ old('product_quantity',$product->product_quantity)}}" placeholder="Product Quantity" class="mb-2 h-10 w-96 @error('product_quantity') border border-red-500 @enderror">
                @error('product_quantity')
                    <p class="text-red-500"> {{ $message }}</p>
                @enderror  
            </div>
        </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="form-group flex flex-col">
            <label for="category_id" class="pb-2"> Select Category </label>
            <select name="category_id" id="category_id" class="w-96 mb-2 h-10 @error('category_id') border border-red-500 @enderror">
                <option>  </option>
                @foreach (\App\Models\Category::latest()->get() as $category)
                    <option value="{{ $category->id}}" {{$category->id == old('category_id',$product->category_id) ? 'selected' : ''}}> {{ $category->cat_name }} </option> 
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500"> {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="form-group flex flex-col">
            <label for="name" class="pb-2"> Select Subcategory </label>
            <select name="subcategory_id" id="subcategory_id" class="w-96 mb-2 h-10 @error('subcategory_id') border border-red-500 @enderror">
                <option> </option>
                @foreach (\App\Models\Subcategory::latest()->get() as $subcategory)
                    <option value="{{ $subcategory->id}}" {{ $subcategory->id == old('subcategoy_id',$product->subcategory_id)?'selected':''}}> {{ $subcategory->subcat_name }} </option>     
                @endforeach
            </select>
            @error('subcategory_id')
                <p class="text-red-500"> {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="form-group flex flex-col">
            <label for="name" class="pb-2"> Select Child category </label>
            <select name="childcategory_id" id="childcategory_id" class="w-96 mb-2 h-10 @error('childcategory_id') border border-red-500 @enderror">
                <option> </option>
                @foreach (\App\Models\Childcategory::latest()->get() as $childcategory)
                    <option value="{{ $childcategory->id}}" {{ $childcategory->id == old('childcategory_id',$product->childcategory_id) ? 'selected' : '' }}> {{ $childcategory->childcat_name }} </option> 
                @endforeach
            </select>
            @error('childcategory_id')
                <p class="text-red-500"> {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <div class="form-group flex flex-col">
            <label for="name" class="pb-2"> Select Brand </label>
            <select name="brand_id" id="brand_id" class="w-96 mb-2 h-10 @error('brand_id') border border-red-500 @enderror">
                <option>  </option>
                @foreach (\App\Models\Brand::latest()->get() as $brand)
                    <option value="{{ $brand->id}}" {{ $brand->id == old('brand_id',$product->brand_id) ? 'selected' : ' ' }}> {{ $brand->name }}  </option>                     
                @endforeach
            </select>
            @error('brand_id')
                <p class="text-red-500"> {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-span-12 md:col-span-6 xl:col-span-8 ">
        <label for="short_text"> Product Short Description (Max:200)</label>
        <textarea name="short_text" cols="50" rows="2" class="w-full">
            {{ old('short_text',$product->short_text) }}
        </textarea>
    </div>

    <div class="col-span-12">
        <label for="description"> Product Description </label>
        <textarea name="description"  cols="30" rows="10" class="w-full" id="body">
            {{ old('description',$product->description)  }}
        </textarea>
    </div>
    <div class="pt-2 col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <label for="tag_id"> Select Tag </label>
        <select class="js-example-basic-single w-96
            @error('tag_id') border border-red-500 @enderror" 
            multiple="multiple" name="tag_id[]" id="tag_id">
            @foreach (\App\Models\Tag::latest()->get() as $tag)
                @if (count($product->tags) == 0)
                    <option value="{{$tag->id }}">{{ $tag->tag_name }}</option> 
                @else
                    @foreach ($product->tags as $item)
                        <option value="{{$tag->id }}"  {{ $tag->id == old('tag_id', $item->id) ? 'selected' : ' ' }}>{{ $tag->tag_name }}</option> 
                    @endforeach  
                @endif 
            @endforeach    
        </select>
        @error('tag_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>
    <div class="pt-2 col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <label for="slider_id"> Select Slider </label>
        <select class="js-example-basic-single w-96
            @error('slider_id') border border-red-500 @enderror" 
            multiple="multiple" name="slider_id[]" id="slider_id">
            @foreach (\App\Models\Slider::latest()->get() as $slider)
                @if (count($product->sliders) == 0)
                    <option value="{{$slider->id }}" data-img_src="{{ asset($slider->img_1) }}"> {{ $slider->slider_name  }}</option>   
                @else
                    @foreach ($product->sliders as $item)
                        <option value="{{$slider->id }}" {{ $slider->id == old('slider_id',$item->id)? 'selected' : '' }}
                            data-img_src="{{ asset($slider->img_1) }}"> {{ $slider->slider_name }}</option>
                    @endforeach 
                @endif 
            @endforeach    
        </select>
        @error('slider_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="pb-4 col-span-12 md:col-span-6 xl:col-span-4 px-3">
        <label for="image_id"> Select Image </label>
        <select class="js-example-basic-single w-96
            @error('image_id') border border-red-500 @enderror" 
            multiple="multiple" name="image_id[]" id="image_id">
            @foreach (\App\Models\Image::latest()->get() as $img)
                @if (count($product->images) == 0)
                    <option value="{{$img->id }}" data-img_src="{{ asset($img->img_path) }}"> {{ $img->name }}</option>
                @else
                    @foreach ($product->images as $item)
                        <option value="{{ $img->id }}" {{ $img->id == old('image_id',$item->id) ? 'selected' : '' }} 
                            data-img_src="{{ asset($img->img_path) }}"> 
                            {{ $img->name }}
                        </option>
                         
                    @endforeach  
                @endif   
            @endforeach    
        </select>
        @error('image_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>
             
    <div class="col-span-12 md:col-span-6 xl:col-span-4 flex justify-around py-4">

        <div class="form-check">
            <input class="free_shipping appearance-none 
                h-4 w-4 border border-gray-300 rounded-sm 
                bg-white checked:bg-blue-600 checked:border-blue-600 
                focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat 
                bg-center bg-contain float-left mr-2 cursor-pointer" 
                type="checkbox" value="1" id="free_shipping"
                name="free_shipping"
                {{ $product->free_shipping == 1 ? 'checked' : 0 }}>
            <label class="inline-block text-gray-800" for="free_shipping">
                Free Shipping 
            </label>
        </div>
        <div class="form-check">
            <input class="upcomming appearance-none h-4 w-4 border 
                border-gray-300 rounded-sm bg-white 
                checked:bg-blue-600 checked:border-blue-600 
                focus:outline-none transition duration-200 
                mt-1 align-top bg-no-repeat bg-center 
                bg-contain float-left mr-2 cursor-pointer"
                type="checkbox" value="1" id="upcomming" 
                name= "upcomming" 
                {{ $product->upcomming == 1 ? 'checked': 0 }}>
            <label class="inline-block text-gray-800" for="Upcomming">
                Upcomming
            </label>
        </div>

    </div>
</div>   
<button type="submit" class="py-2 px-5 bg-green-800 text-white rounded-md my-8"> {{ $button_text }}  </button>

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ig985bs3zdb6vavhd3up71ikml5iplnqyeu2ltyo69pxd1xb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('backend/plugin/simplemde/simplemde.min.js') }}"></script>
    <script> 
        var simplemde = new SimpleMDE({ element: $("#body")[0] });

        $(document).ready(function() {
            $('#tag_id').select2();
            $('#size').tagsInput();
            $('#color').tagsInput();
        });

        $(document).ready(function() {  
            function custom_template(obj){
                var data = $(obj.element).data();
                var text = $(obj.element).text();
                if(data && data['img_src']){
                    img_src = data['img_src'];
                    template = $("<div><img src=\"" + img_src + "\" style=\"width:100%;height:150px;\"/><p style=\"font-weight: 700;font-size:14pt;text-align:center;\">" + text + "</p></div>");
                    return template;
                }
            }
            var options = {
                'templateSelection': custom_template,
                'templateResult': custom_template,
            }
            $('#slider_id').select2(options);
            $('#image_id').select2(options);
            $('.select2-container--default .select2-selection--single').css({'height': '220px'});
        });
    </script>
@endsection