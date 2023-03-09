<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Termwind\render;
use App\Models\Users;


class UserController extends Controller
{
   protected $user;

   public function __construct(UserInterface $userInteface)
   {
       $this->user = $userInteface;


   }

   public function index(Request $request)
   {
       dd($this->user);
       $user = $this->user->List();
    //    if ($request->has('key_search')) {
    //        $user = $this->user->Search($request->key_search);
    //    }
       return view('user.user', compact('user'));
   }

//    public function addItem()
//    {
//
//        return view('user.add');
//    }
//
//    public function addPost(Request $request)
//    {
////        dd($request->name);
//        $rules = [
//            'name' => 'required|min:5'
//        ];
//        $mess = [
//            'required' => 'Trường :attribute Phải được nhập',
//            'min' => "Trường :attribute phải có ít nhất :min ký tự"
//        ];
//        $request->validate($rules, $mess);
//        $this->user->Add($request->name);
//        return redirect()->route('product.index')->with('success', 'Thêm thành công');
//    }
//
//    public function update($id)
//    {
//        $showUpdate = $this->user->showUpdate($id);
//        return view('user.edit', compact('showUpdate'));
//    }
//
//    public function updatePost(Request $request)
//    {
////        dd($request->id);
//        $rules = [
//            'name' => 'required|min:5'
//        ];
//        $mess = [
//            'required' => 'Trường :attribute Phải được nhập',
//            'min' => "Trường :attribute phải có ít nhất :min ký tự"
//        ];
//        $request->validate($rules, $mess);
//        $this->user->UpdateItem($request->id, $request->name);
//        return redirect()->route('product.index')->with('success', 'Sửa thành công');
//    }
//
//    public function deleteItem($id)
//    {
//        $this->user->DeleteItem($id);
//        return redirect()->route('product.index')->with('success', 'Xóa thành công');
//
//    }

}



