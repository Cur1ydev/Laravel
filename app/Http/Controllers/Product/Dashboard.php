<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        return "<h1>Đây là Dashboard</h1>";
    }
}
