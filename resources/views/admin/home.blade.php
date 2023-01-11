@extends('admin.layout.app')
@section('tittle','Strona główna')
@section('content')
    <div class="row ">
        <div class="col-3 card shadow p-2 m-2">
            <div class="p-2 text-center pb-3">
                <label >Moje podsumowanie</label>
            </div>
            <div >
                <div class="text-justify"> Otwarte zgłoszenia: </div>
                <div class="text-justify"> Zamknięte zgłoszenia(30dni): </div>
                <div class="text-justify"> Nieprzepisane zgłoszenia: </div>
                <div class="text-justify"> Lista do zrobienia: </div>
            </div>

        </div>
        <div class="col card shadow m-2" style="width: 18rem; min-height: 500px;">
            <div class="p-2 text-center pb-3">
                Moje zgłoszenia do rozwiązania (last 10)
            </div>
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

                            <th scope="row"><a href="{{route('technican.requestsView',['id'=>$request->id])}}" style="text-decoration: none;color:black">{{$loop->iteration}}</a></th>
                            <td><a href="{{route('technican.requestsView',['id'=>$request->id])}}"style="text-decoration: none;color:black">{{$request->title}}</a></td>
                            <td><a href="{{route('technican.requestsView',['id'=>$request->id])}}"style="text-decoration: none;color:black">{{$request->status}}</a></td>
                            <td><a href="{{route('technican.requestsView',['id'=>$request->id])}}"style="text-decoration: none;color:black">{{$request->created_at}}</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-3 card shadow m-2 "  style="width: 18rem;">
            <div class="p-2 text-center pb-3">
                Lista to do
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
            </ul>
        </div>
    </div>
@endsection

