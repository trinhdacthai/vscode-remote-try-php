<?php

namespace App\Http\Requests\Admin\SystemConfig;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSystemRequest extends FormRequest
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
        $validate =  [
            'system_name' =>['required|min:3|max:255'],
            'system_logo' =>['image|min:10|max:5000'],
            'system_info' =>['required|min:3|max:255'],
            'system_address'=> ['required|min:3|max:255'],
            'system_phone' => ['required','regex:/(0)[0-9]/','not_regex:/[a-z]/','size:10'],
            'system_phone_technology' => ['required','regex:/(0)[0-9]/','not_regex:/[a-z]/','size:10'],
            'system_facebook' =>['required|min:3|max:255'],
        ];
        return $validate;
    }   
    public function messages()
    {
        return config('constants.validate_message');
    }
    public function attributes()
    {
        return config('constants.validate_attribute_alias');
    }
}
