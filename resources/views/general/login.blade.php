@include('admin.layout.style')
@include('admin.layout.scripts')
<div class="containter">

    <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('loginSubmit')}}" method="post">
        @csrf
        @if(session()->has('success'))
            <div style="color:green">{{session()->get('success')}}</div>
        @endif
        @if(session()->has('error'))
            <div style="color:red">{{session()->get('error')}}</div>
        @endif
        <div class="mb-3">
            <label for="Inputlogin" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="Inputlogin">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Sing up</button>
        <a href="{{route('resetPassword')}}" class="btn btn-primary">Reset Password</a>
    </form>

</div>
