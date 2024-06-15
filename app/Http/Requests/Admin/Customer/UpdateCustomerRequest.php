<?php

namespace App\Http\Requests\Admin\Customer;

use App\Helper\DateHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        $this->merge([
            'birthday'=>DateHelper::str_to_date($this->birthday),
        ]);
        $validate = [
            'customer_name'=>['required','between:1,100'],
            'birthday'=>['nullable','date_format:d/m/Y','before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('d/m/Y')],
            'gender'=>['required','integer'],
            'phone'=>['required','regex:/(0)[0-9]/','not_regex:/[a-z]/','size:4',
                Rule::unique('customer','phone')->ignore($this->route('id'))],
            'email'=>['required',Rule::unique('customer','email')->ignore($this->route('id'))],
            'address'=>['max:100'],
            'avatar'=>['image'],
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
