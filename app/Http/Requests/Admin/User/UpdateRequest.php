<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'role' => 'required|integer',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            //'email' => ['required', Rule::unique('users')->ignore($this->route()->user->id)],
        ];
    }
    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }
}
