<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if (session('msg'))
        <h3 style="color: red">{{ session('msg')}}</h3>
    @endif
    <header>Xin chào {{ $title }} </header>
    <main>Tớ là Lợi Xoăn</main>
    <footer>Tác giả {{ $name }}</footer>
</body>

</html>

