<?php

namespace App\Http\Requests\Admin\Project;

use App\Helper\DateHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'date_start'=>DateHelper::str_to_date($this->date_start),
            'date_end'=>DateHelper::str_to_date($this->date_end),
        ]);
        $validate = [
            'project_name'=>['required', 'between:3,255', Rule::unique('project','project_name')->ignore($this->route('id'))],
            'customer_id'=>['required'],
            'date_start'=>['required','date_format:d/m/Y','before:date_end'],
            'date_end'=>['required','date_format:d/m/Y'],
            // 'total_expense'=>['required','integer'],
            'priority'=>['integer'],
            'leader_id'=>['integer','required'],
            'member'=>['required'],
            'project_description'=>['required'],
            'project_image'=>['image'],
            // 'link_document'=>['required'],
            // 'link_source'=>['required'],
            // 'technology'=>['required'],
            // 'categories_id'=>['required'],
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
