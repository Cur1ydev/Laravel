{{-- @if ($errors->any())
    <div class="alert">
        <h5>Đã có lỗi</h5>
    </div>
@endif --}}
@error('msg')
<h3>{{$message}}</h3>
    
@enderror
<h3 style="text-align: center;">Đây là chức năng thêm Sản Phẩm Để Validate</h3>
<form align='center' action="add-post" method="post">
    <input type="text" name="username" placeholder="Username" value="{{old('username')}}"><br>
    @error('username')
        {{-- Vui lòng kiểm tra Tên Sản Phẩm --}}
        {{$message}}
    @enderror
    <br>
    <input type="email" name="email" placeholder="Email" value="{{old('email')}}"><br>
    @error('email')
        {{$message}}
    @enderror
    <br>

    <button name="btn-add">Add</button>
    @csrf
</form>
<!-- <form action="" method="post">
        <button name="btn-add">add</button>
        @csrf
    </form> -->
