<?php

namespace App\Http\Requests\Admin\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AddStaffRequest extends FormRequest
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
        $validate = [
               'fullname'=>['required','between:3,100'],
            //  'identity_number'=>['unique:admin_detail,identity_number','max:20','nullable'],
              'email'=>['required','unique:user,email','between:3,50'],
              'phone'=>['required','unique:user,phone','regex:/(0)[0-9]/','not_regex:/[a-z]/','size:10'],
              'gender'=>['required','integer'],
              'designation_id'=>['required','integer'],
              'user_name'=>['required','unique:user,user_name','between:3,100'],
              'password'=>['required','between:3,50'],
              'identity_number'=>['required','unique:user_detail,identity_number','regex:/[0-9]/','not_regex:/[a-z]/','size:10'],
              'birthday'=>['required','date_format:d/m/Y','before_or_equal:'.\Carbon\Carbon::now()->subYears(17)->format('d/m/Y')],
              'repeat-password'=>['required','between:3,50','same:password'],
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
