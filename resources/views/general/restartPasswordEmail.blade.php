@include('admin.layout.style')
@include('admin.layout.scripts')
<div class="containter">

    <form style="padding-top:40px; margin:auto; width: 300px;" action="{{route('resetPasswordEmail')}}" method="post">
        @csrf
        @if(session()->has('success'))
            <div style="color:green">{{session()->get('success')}}</div>
        @endif
        @if(session()->has('error'))
            <div style="color:red">{{session()->get('error')}}</div>
        @endif
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="InputEmail">
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
        <a href="{{route('login')}}" class="btn btn-primary">Back</a>
    </form>
</div>
