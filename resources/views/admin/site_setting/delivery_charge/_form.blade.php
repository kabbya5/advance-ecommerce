<label for="charge" class="block text-slate-800 bold mb-3"> Delivery Charge </label>
<input type="text" name="charge" value="{{ old('charge',$model->charge) }}" class="w-full">

<label for="text" class="block text-slate-800 bold mb-3 mt-3"> Delivery Text </label>
<input type="text" name="text" value="{{ old('text',$model->text) }}" class="w-full">
<button type="submit" class=" mt-3 p-2 bg-blue-800 text-white"> {{ $button_text }} </button>