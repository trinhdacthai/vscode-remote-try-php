<?php

namespace App\Http\Requests\Home\MyAccount;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UpdateInfoRequest extends FormRequest
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
        request()->session()->flash('update_info',true);
        $admin = DB::table('user_detail')->where('user_id', Auth::guard('admin')->id())->first();
        $validate = [
            'fullname'=>['required','between:3,100'],

            'identity_number'=>['required',Rule::unique('user_detail','identity_number')->ignore($admin->id),
            'regex:/[0-9]/','not_regex:/[a-z]/','size:10'],
            'email'=>['required',
                Rule::unique('user','email')->ignore($admin->id)
                ,'between:3,50'],
            'phone'=>['required', Rule::unique('user','phone')->ignore($admin->id)
            ,'regex:/(0)[0-9]/','not_regex:/[a-z]/','size:10'],
            'gender'=>['required','integer'],
            'designation_id'=>['required','integer'],
            'address'=>['required','max:255'],
            'birthday'=>['required','date_format:d/m/Y','before_or_equal:'.\Carbon\Carbon::now()->subYears(17)->format('d/m/Y')],
            // 'bank_name'=>['required','max:100'],
            // 'bank_author'=>['required','max:50'],
            // 'bank_number'=>['required','max:20'],
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
