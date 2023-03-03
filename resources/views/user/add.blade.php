<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Chức năng thêm sản phẩm</h3>
<a href="{{route('product.index')}}">Trở về Trang chủ</a> <br>

<form action="" method="post">
    <input type="text" name="name" id="" value="{{old('name')}}" placeholder="Tên..."><br>
    @error('name')
    <h4  style="color: red">{{$message}}</h4>
    @enderror
    <button name="btn-add">Add</button>
    @csrf
</form>
</body>
</html>
