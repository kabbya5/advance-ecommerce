<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskSiteSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name'   => 'required',
            'site_email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'address'   => 'required',
            'url_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|',
        ];
    }
}
