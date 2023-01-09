@extends('general.layout.app')
@section('content')
    <center>

        <div class="containter shadow mt-5" style="width:1000px;padding-bottom: 50px;">
            <div class="row p-4">
                <div class="col-11"><label> Title:</label>   {{$form->title}}</div>
                <div class="col-1"><a href="{{route('requests')}}">BACK</a></div>
            </div>
            <div class="row p-4 text-center">
                <div class="col"><label> Technican: </label>  @if($form->id_technik!=0) {{$form->id_technik}} @else Brak @endif</div>
                <div class="col"><label> Status: </label>  {{$form->status}}</div>
            </div>
            <div class="row p-4 mt-4">
                <div class="col-3" style="text-align:right;"><label> Description:</label></div>
                <div class="col-9" style="text-align:justify;"><label> {{$form->description}}</label></div>
            </div>


        </div>
    </center>
@endsection
