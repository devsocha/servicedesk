@extends('admin.layout.app')
@section('tittle','Strona główna')
@section('content')
    <div class="row ">
        <div class="col shadow p-2 m-2">
            <div class="text-center pb-3">
                <label >Moje podsumowanie</label>
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="text-justify"> Otwarte zgłoszenia: </div>
                    <div class="text-justify"> Zamknięte zgłoszenia(30dni): </div>
                    <div class="text-justify"> Nieprzepisane zgłoszenia: </div>
                    <div class="text-justify"> Lista do zrobienia: </div>
                </div>
                <div class="col-2">
                    <div class="text-right"> 2 </div>
                    <div class="text-right"> 4 </div>
                    <div class="text-right"> 11 </div>
                    <div class="text-right"> 6 </div>
                </div>
            </div>

        </div>
        <div class="col-6 shadow p-2 m-2">
            <label>Moje zgłoszenia do rozwiązania (ostatnie 5)</label>
        </div>
        <div class="col shadow p-2 m-2">
            <label>Lista to do</label>
        </div>
@endsection
