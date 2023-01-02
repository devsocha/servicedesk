@extends('admin.admin')
@section('settingsContent')
    <center>

        <div class="containter text-center shadow mt-5" style="width:1000px">
            <form class="pt-4"action="{{route('technican.settings.users.edit.submit')}}" method="post">
                @csrf
                <div class="p-4">
                    <input type="hidden"value="{{$user->id}}" name="id">
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

                            Rola:
                            <select  name="rola"  type="text">
                                @if($user->rola == 1)
                                <option value="1">User</option>
                                <option value="2">Technik</option>
                                <option value="3">Head Technik</option>
                                @endif
                                    @if($user->rola == 2)
                                        <option value="2">Technik</option>
                                        <option value="1">User</option>
                                        <option value="3">Head Technik</option>
                                    @endif
                                    @if($user->rola == 3)
                                        <option value="3">Head Technik</option>
                                        <option value="2">Technik</option>
                                        <option value="1">User</option>
                                    @endif
                                <select/><br><br>
                        Telefon: <input  value="{{$user->telefon}}" name="telefon" type="text"/><br><br>

                    <input class="btn btn-primary" value="edytuj" type="submit"/>
                    <a class="btn btn-secondary" href="{{route('technican.settings')}}">Cofnij</a>
                </div>
            </form>



        </div>
    </center>


@endsection
