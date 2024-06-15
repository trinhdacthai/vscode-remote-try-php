<?php

namespace App\Http\Requests\Admin\Customer;

use App\Helper\DateHelper;
use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
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
            'birthday'=>['nullable','date_format:d/m/Y','before_or_equal:'.\Carbon\Carbon::now()->subYears(17)->format('d/m/Y')],
            'gender'=>['required','integer'],
            'phone'=>['required','unique:customer,phone','regex:/(0)[0-9]/','not_regex:/[a-z]/','size:10'],
            'email'=>['required','unique:customer,email'],
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
