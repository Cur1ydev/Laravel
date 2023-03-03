<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--    <script src="jquery-3.6.3.min.js"></script>--}}

    <title>Document</title>
</head>
<body>
{{-- @if ($errors->any())
    <div class="alert">
        <h5>Đã có lỗi</h5>
    </div>
@endif --}}
@error('msg')
<h3>{{$message}}</h3>

@enderror
<h3 style="text-align: center;">Đây là chức năng thêm Sản Phẩm Để Validate</h3>
<form align='center' action="{{route('Postadd')}}" method="post" id="product-form">
    <input type="text" name="username" class="username" placeholder="Username" value="{{old('username')}}"><br>
    @error('username')
    {{-- Vui lòng kiểm tra Tên Sản Phẩm --}}
    {{$message}}
    @enderror
    <br>
    <input type="email" name="email" class="email" placeholder="Email" value="{{old('email')}}"><br>
    @error('email')
    {{$message}}
    @enderror
    <br>

    <button name="btn-add">Add</button>
    @csrf
</form>
<script>
    $(document).ready(function () {
        $('#product-form').on('submit', function (e) {
            e.preventDefault();
            const username = $('.username').val().trim();
            const email = $('.email').val().trim();
            const CSRFToken = $(this).find('input[name="_token"]').val();
            // console.log(CSRFToken);
            const url=$(this).attr('action')
            $.ajax({
                url: url,

                type: "POST",
                data: {
                    username: username,
                    email: email,
                    _token: CSRFToken
                }
                ,
                dataType: 'type',
                success: function (response) {
                    console.log(response)
                    console.log(123)
                },
                errors: function (error) {
                    console.log(error)
                    console.log(456)
                }
            })

        })
    })
</script>

</body>
</html>
