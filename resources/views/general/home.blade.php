@extends('general.layout.app')
@section('content')
    <center>
        @if(session()->has('success'))
            <div style="color:green">{{session()->get('success')}}</div>
        @endif
        @if(session()->has('error'))
            <div style="color:red">{{session()->get('error')}}</div>
        @endif
    </center>
<div class="card-group">
    @foreach($categories as $category)
    <a href="{{route('forms',['id'=>$category->id])}}" style="text-decoration:none; color:black;">
        <div class="card" style=" width: 18rem;margin:23px;padding: 3px; border:0; ">
            <center><img src="{{asset('uploads/photos/icons'.'/'.$category->photo)}}" class="card-img-top" style="width:15rem" ></center>
            <div class="card-body ">
                <center><h3 class="card-title">{{$category->name}}</h3>
                    <p class="card-text">@if($category->description=='default')<br>@else {{$category->description}}@endif</p></center>
            </div>
        </div>
    </a>
    @endforeach
</div>


@endsection
