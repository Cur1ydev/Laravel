<?php
//Đây là lớp validation sẽ đc dùng trong ValidationController 
namespace App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false; //khi return false sẽ ko validate đc

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "username" => "required|min:6",
            "email" => "required|email"
        ];
    }
    public function messages()
    {
        return [
            "required" => "Trường :attribute Bắt buộc phải nhập"
        ];
    }
    public function attributes()
    {
        return [
            "username" => "Tên"
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // if ($this->somethingElseIsInvalid()) {
            //     $validator->errors()->add(
            //         'field',
            //         'Something is wrong with this field!'
            //     );
            // }

            if ($validator->errors()->count() > 0) {
                $validator->errors()->add(
                    'msg',
                    'Đã có lỗi xảy ra'
                );
            }
         
        });
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            "create_at"=> date("d-m-Y H:i a")
        ]);
    }
    protected function failedAuthorization()
    {
        throw new HttpResponseException(redirect('/')->with('msg','Đã có lỗi xảy ra'));
    }
    
}
