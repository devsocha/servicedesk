<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Aprove request</title>
    @include('general.layout.scripts')
    @include('general.layout.style')
</head>
<body >
<div class="container-fluid">

<center>

        <div class="containter text-center shadow mt-5" style="width:1000px">


            <div class="containter shadow mt-5" style="width:1000px;padding-bottom: 50px;">
                <div class="row p-4">
                    <div class="col-10"></div>
                    @if($aprove->status !== 'Waiting') <div class="col-1">{{$aprove->status}}</div>@else
                    <div class="col-1"><a class="btn btn-success" href="{{route('requests')}}">Accept</a></div>
                    <div class="col-1"><a class="btn btn-danger" href="{{route('requests')}}">Reject</a></div>
                    @endif
                </div>
                <div class="row p-4">

                    <div class="col-3"style="text-align:right;"><label> Title:</label>   </div>
                    <div class="col-9"style="text-align:justify;"><input type="text" style="width: 540px" value="{{$form->title}}" disabled></div>
                </div>
                <div class="row p-4 text-center">
                    <div class="col-3"style="text-align:right;"><label> Technican: </label>  </div>
                    <div class="col-3"style="text-align:justify;"><input type="text" value="@if($form->id_technik!=0) {{$technician->imie}} {{$technician->nazwisko}}@else Brak @endif" disabled></div>
                    <div class="col-1" style="text-align:right;"><label> Status: </label></div>
                    <div class="col-5" style="text-align:justify;"> <input type="text" value="{{$form->status}}" disabled></div>
                </div>
                <div class="row p-4 mt-4">
                    <div class="col-3" style="text-align:right;"><label> Description:</label></div>
                    <div class="col-9" style="text-align:justify;"><textarea style="width: 500px;" disabled>{{$form->description}}</textarea></div>
                </div>
                @if($form->filename)
                    <div class="row p-4 mt-4">
                        <div class="col-3" style="text-align:right;"><label> Załącznik do pobrania:</label></div>
                        <div class="col-9" style="text-align:justify;"><a class="btn btn-primary"href="{{route('download',['file'=>$form->filename])}}">Download</a></div>
                    </div>
                @endif

            </div>
        </div>
    </center>

</div>
</body>
</html>
