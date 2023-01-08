@extends('admin.admin')
@section('settingsContent')
    <center>

        <div class="containter text-center shadow mt-5" style="width:1000px">
            <form class="pt-4"action="{{route('technican.forms.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                Miniaturka: <input type="file" value="{{old('photo')}}" name="photo" placeholder="User email"/>
                <select name="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <input type="text" value="{{old('name')}}" name="name" placeholder="Name"/>
                <div class="p-4">
                    @if(session()->has('success'))
                        <div style="color:green">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('error'))
                        <div style="color:red">{{session()->get('error')}}</div>
                    @endif
                    <input class="btn btn-secondary" value="add forms" type="submit"/>
                </div>
            </form>

            <div class="p-4">
                <table class="table ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">icon</th>
                        <th scope="col">name</th>
                        <th scope="col">category</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($forms as $form)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img style="max-width: 50px" src="{{asset('uploads/photos/icons').'/'.$form->photo}}"/></td>
                            <td>{{$form->name}}</td>
                            <td>{{$form->category->name}}</td>

                            <td>
                                <a class="btn btn-primary" href="{{route('technican.category.edit',['id'=>$form->id])}}" role="button">Edytuj</a>
                                <a class="btn btn-primary" href="{{route('technican.category.delete',['id'=>$form->id])}}" role="button">Usuń</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </center>


@endsection
