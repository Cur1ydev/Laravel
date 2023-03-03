<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    protected $table = "user";
    protected $product="product";
    use HasFactory;
    public function List()
    {
        $sql = DB::table($this->table)->get(); //Tương đương như câu lệnh Select * from
        return $sql;
    }
    public function Add($name)
    {
        $sql = DB::table($this->table)->insert([
            "name" => $name
        ]);
        return $sql;
    }
    public function showUpdate($id){
        $sql=DB::table($this->table)->where('id',$id)->first();
        return $sql;
    }
    public function UpdateItem($id,$name)
    {
        $sql=DB::table($this->table)->where('id',$id)->update(
            [
                'name'=>$name
            ]
        );
        return $sql;
    }
    public function DeleteItem($id){
        $sql=DB::table($this->table)->where('id',$id)->delete();
        return $sql;
    }
    public function Search($keyword){
        $sql =DB::table($this->table)
            ->where('name','like','%'.$keyword.'%')
            ->orWhere('id','like','%'.$keyword.'%')
            ->get();
        return $sql;
    }
    public function ShowInnerJoin(){
        return DB::table($this->table)
            ->join('product',$this->table.'.id','=','product.parent_id')
            ->select($this->table.'.*','product.*') //.* sẽ lấy toàn bộ dữ liệu trong Table
            ->where('product.parent_id',2)
            ->get();
    }
    public function OrderBy(){
        return DB::table($this->product)
//            ->select($this->product.'.*')
            ->select($this->product.'.*',DB::raw("(price1+price2) AS price"))

            ->orderBy('price','asc')
            ->get();
    }}
