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

                        <th scope="col"><img style="max-width: 50px" src="{{asset('uploads/photos/icons').'/'.$form->photo}}"/></th>
                        <th scope="col">{{$form->name}}</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <form class="pt-4"action="{{route('technican.forms.edit.submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <tr>
                            <input type="hidden" value="{{$form->id}}" name="id"/>
                            <td><input type="file" value="{{old('photo')}}" name="photo"/></td>
                            <td><input type="text" value="{{$form->name}}" name="name" placeholder="Name"/></td>
                            <td>
                                <input class="btn btn-secondary" value="edit form" type="submit"/>
                            </td>
                        </tr>
                    </form>
                    </tbody>
                </table>
            </div>

        </div>
    </center>
@endsection
