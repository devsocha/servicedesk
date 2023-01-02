@extends('admin.admin')
@section('settingsContent')
    <center>

        <div class="containter text-center shadow mt-5" style="width:1000px">
            <form class="pt-4"action="{{route('technican.permission.upgrade')}}" method="post">
                @csrf

                <input type="text" value="{{old('email')}}" name="email" placeholder="User email"/>

                <div class="p-4">
                    @if(session()->has('success'))
                        <div style="color:green">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('error'))
                        <div style="color:red">{{session()->get('error')}}</div>
                    @endif
                    <input class="btn btn-secondary" value="Upgrade to technican" type="submit"/>
                </div>
            </form>

            <div class="p-4">
                <table class="table ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$user->login}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->status}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('technican.settings.users.edit',['id'=>$user->id])}}" role="button">Edytuj</a>
                                <a class="btn btn-primary" href="{{route('user.delete',['id'=>$user->id])}}" role="button">Usuń</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </center>


@endsection
