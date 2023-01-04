@extends('admin.admin')
@section('settingsContent')
    <center>

        <div class="containter text-center shadow mt-5" style="width:1000px">
            <form class="pt-4"action="#" method="post">
                @csrf
                Miniaturka: <input type="file" value="{{old('photo')}}" name="photo" placeholder="User email"/>
                <input type="text" value="{{old('name')}}" name="name" placeholder="Name"/>
                <input type="text" value="{{old('description')}}" name="description" placeholder="Description"/>
                <div class="p-4">
                    @if(session()->has('success'))
                        <div style="color:green">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('error'))
                        <div style="color:red">{{session()->get('error')}}</div>
                    @endif
                    <input class="btn btn-secondary" value="add category" type="submit"/>
                </div>
            </form>

            <div class="p-4">
                <table class="table ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">photo</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($users as $user)--}}
{{--                        <tr>--}}
{{--                            <th scope="row">{{$loop->iteration}}</th>--}}
{{--                            <td>{{$user->login}}</td>--}}
{{--                            <td>{{$user->email}}</td>--}}
{{--                            <td>{{$user->status}}</td>--}}
{{--                            <td>--}}
{{--                                <a class="btn btn-primary" href="{{route('technican.settings.users.edit',['id'=>$user->id])}}" role="button">Edytuj</a>--}}
{{--                                <a class="btn btn-primary" href="{{route('user.delete',['id'=>$user->id])}}" role="button">Usuń</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}

                    </tbody>
                </table>
            </div>

        </div>
    </center>


@endsection
