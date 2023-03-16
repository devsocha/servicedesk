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
                            <input type="hidden" value="{{$form->id}}" name="request_id"/>
                            <td><input type="file" value="{{old('photo')}}" name="title"/></td>
                            <td><input type="text" value="{{$form->name}}" name="description" placeholder="Name"/></td>
                            <td>
                                <input class="btn btn-secondary" value="Edit form" type="submit"/>
                            </td>
                        </tr>
                    </form>

                    </tbody>
                </table>
            </div>

        </div>
    </center>
    <center>

        <div class="containter text-center shadow mt-5" style="width:1000px">
            <div class="p-4">
                <table class="table ">
                    <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Description</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <form class="pt-4"action="{{route('addTasks')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <tr>
                            <input type="hidden" value="{{$form->id}}" name="requestId"/>
                            <td><input type="text"  name="task" placeholder="Task"/></td>
                            <td><input type="text"  name="desc" placeholder="Description"/></td>
                            <td>
                                <input class="btn btn-secondary" value="Add task" type="submit"/>
                            </td>
                        </tr>
                    </form>
                    @if($tasks)
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>
                                    <a href="" class="btn btn-primary"  type="submit">Edit task</a>
                                    <a href="{{route('deleteTasks',['id'=>$task->id])}}" class="btn btn-danger"  type="submit">Delete task</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </center>
@endsection
