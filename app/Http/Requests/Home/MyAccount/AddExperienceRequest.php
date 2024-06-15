<?php

namespace App\Http\Requests\Home\MyAccount;

use App\Helper\DateHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AddExperienceRequest extends FormRequest
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
        request()->session()->flash('add_ex',true);
        $this->merge([
            'date_start'=>DateHelper::str_to_date($this->date_start),
            'date_end'=>DateHelper::str_to_date($this->date_end),
        ]);

        $validate = [
            'workplace'=>['required','between:3,100'],
            'designation'=>['required','between:3,50'],
            'date_start'=>['required','date_format:d/m/Y','before:date_end','before:now'],
            'date_end'=>['nullable','date_format:d/m/Y','before:now'],
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
