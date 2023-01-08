@extends('general.layout.app')
@section('content')
    <center>

        <div class="containter text-center shadow mt-5" style="width:1000px">
            <div class="p-4">
                <table class="table ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">status</th>
                        <th scope="col">created at</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requestsInfo as $request)
                                <tr>

                                    <th scope="row"><a href="#" style="text-decoration: none;color:black">{{$loop->iteration}}</a></th>
                                    <td><a href="#"style="text-decoration: none;color:black">{{$request->title}}</a></td>
                                    <td><a href="#"style="text-decoration: none;color:black">{{$request->status}}</a></td>
                                    <td><a href="#"style="text-decoration: none;color:black">{{$request->created_at}}</a></td>
                                </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </center>
@endsection
