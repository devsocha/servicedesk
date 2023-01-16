@extends('general.layout.app')
@section('content')
    <center>

        <form style="width: 800px; margin-top:100px;" method="post" action="{{route('form.submit')}}">
        @csrf
            <div style="margin-bottom: 40px;">
                FORM: {{$form->name}}
            </div>
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Tytuł</label>
                <div class="col-sm-10">
                    <input name="title" type="text" class="form-control" id="input3" value="{{\Illuminate\Support\Facades\Auth::guard('web')->user()->imie}} {{\Illuminate\Support\Facades\Auth::guard('web')->user()->nazwisko}} requesting category {{$form->category->name}} type {{$form->name}}">
                </div>
            </div>
            <input name="company"type="hidden"  value="{{\Illuminate\Support\Facades\Auth::guard('web')->user()->id_firma}}">
            <input name="id_user" type="hidden"  value="{{\Illuminate\Support\Facades\Auth::guard('web')->user()->id}}">

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Opis</label>
                <textarea name="description"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Wyślij zgłoszenie</button>
        </form>
    </center>
@endsection