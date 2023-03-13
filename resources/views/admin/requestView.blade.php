@extends('admin.layout.app')
@section('tittle','Request')
@section('content')
<center>
    <div class="containter shadow mt-5" style="width:1000px;padding-bottom: 50px;">
        <div class="row p-4">
            @if($form->status!='closed')
                <div class="col-2">@if($form->id_technik==0)<a class="btn btn-primary"href="{{route('requestsViewTake',['id'=>$form->id])}}">Przejmij</a>@elseif($form->id_technik==\Illuminate\Support\Facades\Auth::guard()->user()->id)
                    <form action="{{route('requestsViewTakeNew',['id'=>$form->id])}}" method="post">
                        @csrf
                        <select name="idTechnican">
                            <option value="{{$form->id_technik==\Illuminate\Support\Facades\Auth::guard()->user()->id}}">{{\Illuminate\Support\Facades\Auth::guard()->user()->imie}} {{\Illuminate\Support\Facades\Auth::guard()->user()->nazwisko}}</option>
                        @foreach($technicans as $technican)
                            <option value="{{$technican->id}}">{{$technican->imie}} {{$technican->nazwisko}}</option>
                            @endforeach
                        </select>
                        <input type="submit" class="btn btn-success mt-2" value="Przypisz">
                    </form>
                @endif </div>
                <div class="col-1">@if($form->id_technik==\Illuminate\Support\Facades\Auth::guard()->user()->id)<a class="btn btn-success " href="{{route('requestsViewEnd',['id'=>$form->id])}}">Zakończ </a>@endif</div>

                <div class="col-8"></div>
            @else
                <div class="col-11"></div>
            @endif
            <div class="col-1"><a class="btn btn-danger " href="{{route('technican.requests')}}">BACK</a></div>
        </div>
        <div class="row p-4">

            <div class="col-3"style="text-align:right;"><label> Title:</label>   </div>
            <div class="col-9"style="text-align:justify;"><input type="text" style="width: 540px" value="{{$form->title}}" disabled></div>

        </div>
        <div class="row p-4 text-center">
            <div class="col-3"style="text-align:right;"><label> Technican: </label>  </div>
            <div class="col-3"style="text-align:justify;"><input type="text" value="@if($form->id_technik!=0) {{$technican->imie}} {{$technican->nazwisko}} @else Brak @endif" disabled></div>
            <div class="col-1" style="text-align:right;"><label> Status: </label></div>
            <div class="col-5" style="text-align:justify;"> <input type="text" value="{{$form->status}}" disabled></div>
        </div>
        <div class="row p-4 mt-4">
            <div class="col-3" style="text-align:right;"><label> Description:</label></div>
            <div class="col-9" style="text-align:justify;"><textarea style="width: 500px;" disabled>{{$form->description}}</textarea>
        </div>
    </div>
        @if($form->filename)
            <div class="row p-4 mt-4">
                <div class="col-3" style="text-align:right;"><label> Załącznik do pobrania:</label></div>
                <div class="col-9" style="text-align:justify;"><a class="btn btn-primary"href="{{route('download',['file'=>$form->filename])}}">Download</a></div>
            </div>
    @endif
</center>
@endsection
