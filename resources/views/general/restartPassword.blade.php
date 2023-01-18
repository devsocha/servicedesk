@include('general.layout.style')
@include('general.layout.scripts')
<div class="container-fluid">
    <form style="padding-top:40px; margin:auto; width: 300px;" method="post" action="{{route('user.registrationSubmit')}}">
        <h3>Confirm your password</h3>

        @if(session()->has('error'))
            <div style="color:red">{{session()->get('error')}}</div>
        @endif
        @csrf
        <input type="hidden" name="email"value="{{$email}}" >
        <input type="hidden" name="token"value="{{$token}}" >
        <input type="password" name="password"class="form-control" placeholder="password" >
        <br>
        <input type="password" name="retypePassword" class="form-control" placeholder="retype password">
        <br>
        <input type="submit" class="btn btn-primary" value="verify">
    </form>
</div>
