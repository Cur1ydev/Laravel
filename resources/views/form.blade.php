<form action="" method="post">
    @if (session('mess'))
    <h3>{{session('mess')}}</h3>
    @endif  
    <input type="text" name="username" value="{{old('username')}}">
    <br><br>
    <input type="text" name="email" value="{{old('email')}}">
    <br><br>
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
    <button name="btn">submit</button>
</form>