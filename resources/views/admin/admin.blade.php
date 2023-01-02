@extends('admin.layout.app')
@section('tittle','Admin')
@section('content')

    <div class="scroll-target shadow center" >
        <header class="d-flex justify-content-center " style="background-color:#DBDBDB;">
            <ul class="nav nav-pills ">
                <li class="nav-item m-1"><a href="{{route('technican.settings')}}" class="nav-link">Users</a></li>
                <li class="nav-item m-1"><a href="{{route('technican.settings.technican')}}" class="nav-link">Technican</a></li>
                <li class="nav-item m-1"><a href="#" class="nav-link">Category</a></li>
            </ul>
        </header>
    </div>
    @yield('settingsContent')

@endsection
