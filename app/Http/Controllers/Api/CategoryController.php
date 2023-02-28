<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(Request $request)
    {
        /*
            Nếu là trang danh sách chuyên mục thì sẽ echo thành  Hello Phạm Lợi
        */
        // if($request->is("category")){
        //     echo "Xin Chào Phạm Văn Lợi";
        //     // echo dd($request);
        // }
    }
    public function index(Request $request)
    {
        // $url=$request->url();
        // echo $url;
        // $fullUrl= $request->fullUrl();
        // echo $fullUrl;
        // $method=$request->method();
        // echo $method;
        // echo $request->ip();
        // dd($request->server()); //$request->serve sẽ trả về 1 mảng dữ liệu
        // dd($request->header()["accept"]);//$request->header sẽ trả về 1 mảng dữ liệu
        // dd($request->input());//Hàm này sẽ in ra 1 mảng những input đã truyền vào url
        // echo $request->name;//Lấy giá trị name truyền vào từ url
        // dd($request->input("id.*.name"));
        // if($request->isMethod("get")){
        //     echo "Đây là Phương Thức Get";
        // }

        //Helper trong Laravel
        // dd(request("name","Loideptrai")); //Tham số thứ 2 sẽ là mặc định nếu k tìm thấy name


        // echo $request->query("name"); //Cách này sẽ Thông dụng hơn,Lấy giá trị id sau dấu "?"
        //hàm Query chỉ lấy QueryString (Sẽ ko lấy đc từ form)

        // dd($request->query());
        //  $username= $request->old('username'); //Dùng để chạy hàm Flash
        // if($request->isMethod("post")){
        //     echo "Đây là Phương Thức Post";
        // }
        // $request->has("username");//Kiểm tra xem có tồn tại username không ?
        
        if (isset($_POST["btn"])) {
            $request->username; //Sử dụng để lấy giá trị bên trong input
            $request->flash('username');//Tương Đương với SeSSion nhưng sẽ tự động xóa khi reload lại trang
            return redirect(route("cate_add")); 
            
        }
        return view("form");
        // $getAll = $request->all();
        // echo $getAll["id"];
        // echo dd($getAll);
    }
    public function showPost(Request $request)
    {


        if (isset($_POST["btn"])) {
            echo $request->path();
            // $getAll = $request->all();
            // echo $getAll["username"];
            // // echo dd($getAll);
        }
        return view("form");
    }
}
