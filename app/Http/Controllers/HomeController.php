<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

//use DB;
class HomeController extends Controller
{
    protected $table="user";
    public function index()
    {
        echo "Đây là Home Controller";
    }
    public function danhmuc($id)
    {
        return "Đây là danh mục sản phẩm " . $id;
    }
    public function downloadFile(Request $request)
    {


        if (!empty($request->img)) {

            $image = trim($request->img);
            $fullUrl = 'image_' . uniqid() . '.jpg';
            // $fullUrl = basename($image);
            return response()->download($image, $fullUrl);
        }
    }
    public function downloadDoc(Request $request)
    {
        $file = trim($request->file);
        // $fullUrl = 'image_' . uniqid() . '.jpg';
        $fullUrl = basename($file);
        $headers = [
            "Content-Type" => "Application/pdf"
        ];
        return response()->download($file, $fullUrl, $headers);
    }
    public function indexDataBase(){

       $user= DB::select('SELECT * FROM user WHERE name=?',['Lợi']);
       dd($user);
    }
}
