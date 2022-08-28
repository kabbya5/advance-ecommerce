<div class="form-group flex flex-col my-4">
    <label for="terms_and_conditon" class="py-2 text-md text-slate-500 semibold"> Terms And Conditon </label>
    <textarea name="terms_and_condition" id="terms_and_condition" cols="30" rows="10">
        {{ old('terms_and_condition',$model->terms_and_condition) }}
    </textarea>

    <label for="privacy_policy" class="py-2 text-md text-slate-500 semibold"> Privacy Policy </label>
    <textarea name="privacy_policy" id="privacy_policy" cols="30" rows="10">
        {{ old('privacy_policy',$model->privacy_policy) }}
    </textarea>

    <label for="return_policy" class="py-2 text-md text-slate-500 semibold"> Return Policy </label>
    <textarea name="return_policy" id="return_policy" cols="30" rows="10">
        {{ old('return_policy',$model->return_policy) }}
    </textarea>

</div>

<button type="submit" class="text-white bg-blue-800 px-3 py-2"> {{ $button_text }} </button>