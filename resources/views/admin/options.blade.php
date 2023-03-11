@extends('admin.layout.app')
@section('tittle','Options')
@section('content')
    <center>

        <div class="containter text-center shadow mt-5" style="width:1000px">
            <form class="pt-4"action="{{route('options.submit')}}" method="post">
                @csrf
                <div class="p-4">
                    <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::guard()->user()->id}}" name="id">
                    @if(session()->has('success'))
                        <div style="color:green">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('error'))
                        <div style="color:red">{{session()->get('error')}}</div>
                    @endif
                    Imie i nazwisko: <input  value="{{$user->imie}}" name="imie" type="text"/>
                    <input  value="{{$user->nazwisko}}" name="nazwisko" type="text"/><br><br>
                    Status: {{$user->status}}<br><br>
                    Login: <input  value="{{$user->login}}" name="login" type="text"/><br><br>
                    Email: <input  value="{{$user->email}}" name="email" type="text"/><br><br>
                    Telefon: <input  value="{{$user->telefon}}" name="telefon" type="text"/><br><br>
                    Old password: <input name="oldPassword" placeholder="*********" type="password"/><br><br>
                    Password: <input name="password" placeholder="*********" type="password"/><br><br>
                    Retype password: <input  name="retypePassword" placeholder="*********" type="password"/><br><br>
                    <input class="btn btn-primary" value="edytuj" type="submit"/>
                </div>
            </form>



        </div>
    </center>


@endsection
