<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|max:255|min:4',
            'address' => 'required',
            'link_gmap' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'link_whatsapp' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
        ];
    }
}
