@extends('admin.admin')
@section('settingsContent')
<div class="card-group">
    @foreach($categories as $category)
    <a href="#" style="text-decoration:none; color:black;">
        <div class="card" style=" width: 18rem;margin:3px;padding: 3px;  ">
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
