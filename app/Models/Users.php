<?php
//
namespace App\Models;

use App\Interface\UserInterface as InterfaceUserInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Interfaces\UserInterface;

class Users extends Model implements UserInterface
{
   protected $table = "user";
   protected $product = "product";
   use HasFactory;
   

   public function List()
   {
       //Tương đương như câu lệnh Select * from
       return DB::table($this->table)->get();
   }

   public function Add($name)
   {
       return DB::table($this->table)->insert([
           "name" => $name
       ]);
   }

   public function showUpdate($id)
   {
       return DB::table($this->table)->where('id', $id)->first();
   }

   public function UpdateItem($id, $name)
   {
       return DB::table($this->table)->where('id', $id)->update(
           [
               'name' => $name
           ]
       );
   }

   public function DeleteItem($id)
   {
       return DB::table($this->table)->where('id', $id)->delete();
   }

   public function Search($keyword)
   {
       $sql = DB::table($this->table)
           ->where('name', 'like', '%' . $keyword . '%')
           ->orWhere('id', 'like', '%' . $keyword . '%')
           ->get();
       return $sql;
   }

   public function ShowInnerJoin()
   {
       return DB::table($this->table)
           ->join('product', $this->table . '.id', '=', 'product.parent_id')
           ->select($this->table . '.*', 'product.*') //.* sẽ lấy toàn bộ dữ liệu trong Table
           ->where('product.parent_id', 2)
           ->get();
   }

   public function OrderBy()
   {
       return DB::table($this->product)
//            ->select($this->product.'.*')
           ->select($this->product . '.*', DB::raw("(price1+price2) AS price"))
           ->orderBy('price', 'asc')
           ->get();
   }

   public function Date()
   {
//        return DB::table($this->product)
//            ->whereDate('create_at','2021-04-29')
//            ->get();
//        return DB::table($this->product)
//            ->whereMonth('create_at','04')
//            ->get();
//        return DB::table($this->product)
//            ->whereDay('create_at','29')
//            ->get();
//        return DB::table($this->product)
//            ->whereYear('create_at','2023')
//            ->get();
//        return DB::table($this->product)
//            ->whereColumn('price2','price1')
//            ->get();
//        return DB::table($this->product)
//            ->whereColumn('price2','<','price1')
//            ->get();
//        return DB::table($this->product)
//            ->whereColumn('price2','<','price1')
//            ->orWhereColumn('price2','price1')
//            ->get();
//        return DB::table($this->product)
//            ->whereColumn(
//                [
//                    ['price2', 'price1'],
//                    ['price1','price2']
//                ]
//            )
//            ->get();
//        return DB::table($this->product)
//            ->select(DB::raw('count(price2) as Count_price'),'price2')
//            ->groupBy('price2')
//            ->having('Count_price','>=','2')
//            ->get();
//        return DB::table($this->product)
//
//            ->limit(2)
//            ->offset(0)
//            ->get();
//        $id= DB::table($this->table)->insert([
//            "name" => "abc.xyz"
//        ]);
//        return DB::getPdo()->lastInsertId();
//        return DB::table($this->table)
//            ->insertGetId([
//                'name'=>"Phạm Văn Lợi"
//            ]);
//        return DB::table($this->table)
//            ->where('id', 9)
//            ->update([
//                'name' => 'Lợi quá handsome'
//            ]);

       //đếm số bản ghi
       return DB::table($this->table)
           ->where('id','>',7)
//            ->groupByRaw()
           ->count();

   }
}





