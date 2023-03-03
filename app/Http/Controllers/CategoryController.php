<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return 123;
    }

    //lấy ra 1 chuyên mục theo id get
    public function getCategory($id)
    {

    }

    //Cập nhật danh mục theo id post
    public function updateCategory($id)
    {

    }

    //Thêm danh mục
    public function addCategory()
    {

    }

    public function add()
    {
        $abc = $this->index();
        echo $abc;
    }


}
