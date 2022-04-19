<div class="camera" style='width: 309px; display:inline-block;'>

    <div style='border: 1px solid #555;'>
        <h5 style='text-align: center;'>Camera nr : <strong>{{ $room->roomNumber }}</strong></h5>
        <h5>Pachetul : <strong>{{$room->displayName}}</strong></h5>
        <h5>Etaj: <strong>{{$room->roomLocation}}</strong></h5>
        <h5>Nr pers cazate : <strong><span style='color:#ff0000'>{{$room->recordsCount}}</span></strong></h5>
    </div>
    <a class="btn btn-info" href="{{route('admininfo', ['id'=>$room->roomNumber])}}">INFO</a>

</div>
