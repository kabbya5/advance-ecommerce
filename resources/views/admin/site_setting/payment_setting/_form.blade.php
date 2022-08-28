<div class="form-group flex flex-col my-4">
    <label for="payment_setting" class="py-2 text-md text-slate-500 semibold"> Payment Setting Create </label>
    <textarea name="payment_setting" id="payment_setting" cols="30" rows="10">
        {{ old('payment_setting',$model->payment_setting) }}
    </textarea>
</div>

<button type="submit" class="text-white bg-blue-800 px-3 py-2"> {{ $button_text }} </button>