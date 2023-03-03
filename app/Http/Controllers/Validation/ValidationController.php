<?php

namespace App\Http\Controllers\Validation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\Uppercase;
use App\Http\Requests\ProductRequest; // sử dụng namespace của productRequest

class ValidationController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        return view('validation.addvalidation');
    }
    public function addPost(Request $request) //khi sử dụng productRequest thì validate sẽ tự động nhập
    {
//        return "quá là oke ";

//        $rules = [
//            "username" =>["required","min:6",new Uppercase()],
//            "email" => ["required","email"]
//        ];
        $rules = [
            "username" =>["required","min:6",function($attribute,$value,$fail){
                if($value!=mb_strtoupper($value,'UTF-8')){
                    $fail('Trường :attribute không hợp lệ');
                }
            }],
            "email" => ["required","email"]
        ];
        // $mess=[
        //     "required" => "Trường :attribute Bắt buộc phải nhập"
        // ];
        $mess = [
            "username.required" => "Tên Sản Phẩm Bắt Buộc Phải Nhập",
            // "username.required" => "Trường :attribute Bắt Buộc Phải Nhập",
            "email.email" => "Phải đúng định dạnh email",
            "email.required" => "email phải được nhập",
            "username.min" => "Tên Sản Phẩm Bắt Buộc có :min ký tự",

        ];
        $atttribute=[
            "username" => "Tên"
        ];
        //    Validator::make($request->all(),$rules,$mess,$atttribute)->validate();
        $validate = Validator::make($request->all(), $rules, $mess);
        //khi gọi fails thì sẽ ko chuyển hướng
        if($validate->validated()){
            return redirect()->route("./")->with('msg','validate thành công');
        }
//        if($validate->fails()){
//            return "Validate Thất Bại";
//        }
//        else{
//            return redirect("./")->with('msg','validate thành công');
//        }
        // dd($request);

        // dd($request->all());
        // echo 123;

        // // $mess=[
        // //     "username.required" => "Tên Sản Phẩm Bắt Buộc Phải Nhập",
        // //     // "username.required" => "Trường :attribute Bắt Buộc Phải Nhập",
        // //     "email.email" => "Phải đúng định dạnh email",
        // //     "username.min" => "Tên Sản Phẩm Bắt Buộc có :min ký tự",
        // // ];

        // $request->validate($rules,$mess);

    }

}
