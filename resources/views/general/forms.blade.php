@extends('general.layout.app')
@section('content')
    <div class="card-group">

        @foreach($forms as $form)
            <a href="{{route('form',['id'=>$form->id])}}" style="text-decoration:none; color:black;">
                <div class="card" style=" width: 18rem;margin:23px;padding: 3px; border:0; ">
                    <center><img src="{{asset('uploads/photos/icons'.'/'.$form->photo)}}" class="card-img-top" style="width:15rem" ></center>
                    <div class="card-body ">
                        <center><h3 class="card-title">{{$form->name}}</h3></center>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
