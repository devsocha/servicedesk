@extends('admin.admin')
@section('settingsContent')
    <center>

        <div class="containter text-center shadow mt-5" style="width:1000px">
            <form class="pt-4"action="{{route('technican.category.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                Miniaturka: <input type="file" value="{{old('photo')}}" name="photo" placeholder="User email"/>
                <input type="text" value="{{old('name')}}" name="name" placeholder="Name"/>
                <input type="text" value="default" name="description" placeholder="Description"/>
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
                        <th scope="col">icon</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img style="max-width: 50px" src="{{asset('uploads/photos/icons').'/'.$category->photo}}"/></td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>

                            <td>
                                <a class="btn btn-primary" href="#" role="button">Edytuj</a>
                                <a class="btn btn-primary" href="{{route('technican.category.delete',['id'=>$category->id])}}" role="button">Usuń</a>
                            </td>
                        </tr>
                    @endforeach
{{--                    {{route('',['id'=>$category->id])}}--}}
                    </tbody>
                </table>
            </div>

        </div>
    </center>


@endsection
