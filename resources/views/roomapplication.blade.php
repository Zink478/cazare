@extends('layout')
@section('main_content')
    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-md-12">
                        <div>
                            <h1>Aici poti depune cerere de cazare in camera curenta!<br></h1>
                            <div class="camera" style='width: 309px; display:inline-block;'>

                                <div style='border: 1px solid #555;' class="rounded">
                                    <h5 style='text-align: center;'>Camera nr : <strong>{{ $room->roomNumber }}</strong></h5>
                                    <h5>Pachetul : <strong>{{$room->displayName}}</strong></h5>
                                    <h5>Etaj: <strong>{{$room->roomLocation}}</strong></h5>
                                    <h5>Nr pers cazate : <strong><span style='color:red'>{{$room->recordsCount}}</span></strong></h5>
                                </div>

                            </div>

                        @if(!(isset($student)))
                                Introdu datele tale ca student in Profile!
                            @else
                                @if($appExists == NULL)
                                <div class="d-inline-block">
                                <form method="post" action="{{route('application.save')}}" >
                                    {{ csrf_field() }}
                                    <label class="label label-info"> IDNP </label>
                                <input type="text" name="IDNP" value="" />
                                    <label class="label label-info"> Prenume </label>
                                <input type="text" value="{{$student->name}}" disabled />
                                    <label class="label label-info"> Nume </label>
                                <input type="text" value="{{$student->surname}}" disabled>
                                    <label class="label label-info"> Numarul camerei </label>
                                    <input type="text" name="roomNumber" value="" />
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="checkBox" id="flexRadioDefault1">
                                    <label class="form-check-label pl-5" for="flexRadioDefault1">
                                        Sunt de acord cu termenii de utilizare și politica de confidențialitate
                                    </label>
                                    <button type="submit" class="btn btn-primary">Depune cerere</button>
                                </div>
                                </form>

                                </div>
                                    @endif
                            @endif
                            @if($appExists != NULL)
                                @if(!isset($approved))
                                <h1> Deja ai depus cerere! Asteapta sa fie procesata!</h1>
                                <div class="d-inline-block">
                                        <label class="label label-info"> IDNP </label>
                                        <input type="text" name="IDNP" value="{{$student->IDNP}}" disabled/>
                                        <label class="label label-info"> Prenume </label>
                                        <input type="text" value="{{$student->name}}" disabled />
                                        <label class="label label-info"> Nume </label>
                                        <input type="text" value="{{$student->surname}}" disabled>
                                        <label class="label label-info"> Numarul camerei </label>
                                        <input type="text" name="roomNumber" value="{{$room->roomNumber}}" disabled/>

                                </div>
                                <a class="btn btn-danger" href="{{route('application.delete', ['IDNP' => $student->IDNP])}}">Sterge cererea</a>
                                @else
                                    <h1>Felicitari! Ai fost cazat</h1>
{{--                                    <div class="md-col-2"><a class="btn btn-info" href="{{route('qr', ['IDNP' => $student->IDNP])}}">Click for QR</a>--}}
                                {{QrCode::size(150)->generate($student->IDNP)}}

                                    <div class="md-col-2"><a class="btn btn-success" href="{{route('qr', ['IDNP' => $student->IDNP])}}">Descarca QR code</a>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
