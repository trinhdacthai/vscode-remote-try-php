<?php

namespace App\Http\Requests\Home\MyAccount;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UpdatePasswordRequest extends FormRequest
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
        request()->session()->flash('update_password',true);
        $admin = DB::table('user_detail')->where('user_id',Auth::guard('admin')->id())->first();
        $validate = [
            'password_old'=>['required'],
            'password_new'=>['required'],
            'password_again'=>['required', 'same:password_new'],
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
