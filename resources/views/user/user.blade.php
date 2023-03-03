<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 50%;
            height: 100px;
            text-align: center;
            margin: 0 auto;
            padding: 0;

        }

        h3 {
            text-align: center;
            color: red;
        }

        h2 {
            text-align: center;
            color: yellowgreen;
        }

        #form {
            /*margin: 0 auto;*/
            /*padding: 0;*/
            margin-left: 40%;
        }
    </style>
</head>
<body>
@if(session('success'))
    <h2>{{session('success')}}</h2>
@endif
<h3>Danh sách Sản Phẩm</h3>
<form action="" method="post" id="form">
    <input type="text" name="key_search" id="" placeholder="Tìm kiếm gì đó ...">
    <button name="btn_search">Search</button>
    @csrf
</form>
<br>
<table border="1" style="border-collapse: collapse">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($user)>0)
    @foreach($user as $item => $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>
                <button onclick="location.href='{{route('product.add')}}'">Thêm</button>
                <button onclick="location.href='{{route('product.update',[$value->id])}}'">Sửa</button>
                <button onclick="location.href='{{route('product.delete',[$value->id])}}'">Xóa</button>
            </td>
        </tr>
    @endforeach
    @else
        <tr ><td colspan="3">Xin lỗi,Không có gì để hiển thị</td></tr>
    @endif


    </tbody>
</table>
</body>
</html>
