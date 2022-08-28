<div class="form-group flex flex-col my-4">
    <label for="site_name " class="py-2"> Website Name </label>
    <input type="text" name="site_name" id="site_name" value="{{ old('site_name',$model->site_name) }}" 
        class="w-fll @error('site_name') border border-red-500 @enderror">
    @error('site_name')
        <p class="text-red-500"> {{ $message }}</p> 
    @enderror

    <label for="site_email" class="py-2"> Contact Email </label>
    <input type="text" name="site_email" id="site_email" value="{{ old('site_email',$model->site_email) }}" 
        class="w-fll @error('site_email') border border-red-500 @enderror">
    @error('site_email')
        <p class="text-red-500"> {{ $message }}</p> 
    @enderror

    <label for="phone" class="py-2"> Phnone Number </label>
    <input type="text" name="phone" id="phone" value="{{ old('phone',$model->phone) }}" 
        class="w-fll @error('phone') border border-red-500 @enderror">
    @error('phone')
        <p class="text-red-500"> {{ $message }}</p> 
    @enderror

    <label for="phone2" class="py-2"> Phnone Number </label>
    <input type="text" name="phone2" id="phone2" value="{{ old('phone2',$model->phone2) }}" 
        class="w-fll @error('phone2') border border-red-500 @enderror">
    @error('phone2')
        <p class="text-red-500"> {{ $message }}</p> 
    @enderror
    <label for="address" class="py-2"> Contact Address </label>
    <input type="text" name="address" id="address" value="{{ old('address',$model->address) }}" 
        class="w-fll @error('address') border border-red-500 @enderror">
    @error('address')
        <p class="text-red-500"> {{ $message }}</p> 
    @enderror

    <label for="facebook_url" class="py-2"> Facebook Url </label>
    <input type="text" name="facebook_url" id="facebook_url" value="{{ old('facebook_url',$model->facebook_url) }}" 
        class="w-fll @error('facebook_url') border border-red-500 @enderror">
    @error('facebook_url')
        <p class="text-red-500"> {{ $message }}</p> 
    @enderror

    <label for="logo" class="py-2"> Address Logo </label>
    <input type="file" name="logo" id="logo" value="{{ old('logo',$model->logo) }}" 
    class="w-fll">

    <input type="hidden" name="old_logo" value="{{ $model->logo }}">
    <img src="{{ asset($model->logo) }}" alt="{{ $model->logo}}" class="w-20 h-20">
</div>

<button type="submit" class="text-white bg-blue-800 px-3 py-2"> {{ $button_text }} </button>