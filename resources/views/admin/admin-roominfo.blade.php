@extends('admin.adminlayout')
@section('title') Informatie despre camera @endsection
@section('main_content')
    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div>

                        <div>
                            <h1>Aici puteti interactiona cu camera si studentii cazati in ea<br></h1>

                            <div class="camera d-block align-content-center">
                                <div style='border: 1px solid #555;'>
                                    <h5>Camera nr : <strong>{{ $room->roomNumber }}</strong></h5>
                                    <h5>Pachetul : <strong>{{ $room->roomType }}</strong></h5>
                                    <h5>Etaj: <strong>{{ $room->roomLocation }}</strong></h5>
                                    <h5>Nr pers cazate : <strong><span style='color:#ff0000'>{{$room->recordsCount}}</span></strong></h5>
                                </div>
                            </div>

                            @foreach($students as $student)
                                <div class="student text-center border-success d-inline d-flex justify-content-around">
                                    <h3>IDNP: {{$student->IDNP}}</h3>
                                    <h4>Nume: {{$student->surname}}</h4>
                                    <h4>Prenume: {{$student->name}}</h4>
                                    <h5></h5>
                                    <a class="btn btn-danger mt-2 mb-2" href="{{route('student.kick', ['IDNP' => $student->IDNP])}}">ALUNGĂ</a>
{{--                                    <form method="post" action="{{route('record.update', ['roomNumber' => $student->roomNumber])}}">--}}
{{--                                        {{csrf_field()}}--}}
{{--                                    <select name="roomNumber" id="roomNumber">--}}
{{--                                                @foreach($rooms as $room)--}}
{{--                                            <option value="{{$room->roomNumber}}">{{$room->roomNumber}}</option>--}}
{{--                                                @endforeach--}}
{{--                                    </form>--}}
{{--                                    </select>--}}
{{--                                    <button class="btn btn-info mt-2 mb-2" type="submit">MUTĂ</button>--}}
{{--                                    </form>--}}
                                </div>

                                @if($students === NULL)
                                    <h1> Momentan, aici nu sunt cazati studenti!</h1>
                                @endif

                            @endforeach

                            <hr>
                            <br>
                        </div>
                    </div>

            </div>
        </div>
    </section>
@endsection
