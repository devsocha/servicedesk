@extends('admin.admin')
@section('settingsContent')
<center>

    <div class="containter text-center shadow mt-5" style="width:1000px">

        @if(session()->has('success'))
            <div style="color:green">{{session()->get('success')}}</div>
        @endif
        @if(session()->has('error'))
            <div style="color:red">{{session()->get('error')}}</div>
            @endif


        <div class="p-4">
            <table class="table ">
                <thead>
                <tr>

                    <th scope="col"><img style="max-width: 50px" src="{{asset('uploads/photos/icons').'/'.$category->photo}}"/></th>
                    <th scope="col">{{$category->name}}</th>
                    <th scope="col">{{$category->description}}</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                <form class="pt-4"action="{{route('technican.category.edit.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <tr>
                        <input type="hidden" value="{{$category->id}}" name="id"/>
                        <td><input type="file" value="{{old('photo')}}" name="photo" placeholder="User email"/></td>
                        <td><input type="text" value="{{$category->name}}" name="name" placeholder="Name"/></td>
                        <td><input type="text"  name="description" value="{{$category->description}}" placeholder="Description"/></td>
                        <td>
                            <input class="btn btn-secondary" value="edit category" type="submit"/>
                        </td>
                    </tr>
                </form>
                </tbody>
            </table>
        </div>

    </div>
</center>
@endsection
