<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
    public function withValidation($validator)
    {
        $validator->after(function ($validator) {
            // if ($this->somethingElseIsInvalid()) {
            //     $validator->errors()->add(
            //         'field',
            //         'Something is wrong with this field!'
            //     );
            // }
            dd($validator);
        });
    }
}
