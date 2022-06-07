@extends('layout')
@section('main_content')
    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-md-12">
                        <div>
                            <h2>Se va efectua cazarea după pachetul ales de dvs</h2>
                            <p>In cazul în care camera este colorată cu roşu, înseamnă că s-a atins nr maxim de persoane în odaie. <br></p>
                            <hr>

                            <h3>Pachetul : minim necesar</h3>
                            <br>

                            @foreach($roomType1 as $room)
                                @include('room-card', ['room' => $room])
                            @endforeach

                            <hr>
                            <br>
                            <h3>Pachetul : standard</h3>
                            <br>

                            @foreach($roomType2 as $room)
                                @include('room-card', ['room' => $room])
                            @endforeach
                            <br>
                            <hr>
                            <h3>Pachetul : superior</h3>
                            <br>

                            @foreach($roomType3 as $room)
                                @include('room-card', ['room' => $room])
                            @endforeach
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </section>
@endsection
