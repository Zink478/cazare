@extends('layout')

@section('main_content')

    @if(isset($profile))

    <form method="post" action="{{route('profile.update', [ 'student' => $profile->id ])}}" style="text-align: center">
        {{csrf_field()}}

        IDNP <input type="text" name="IDNP" value="{{ $profile->IDNP }}" disabled><br>
        Prenume <input type="text" name="name" value="{{$profile->name}}" disabled><br>
        Nume <input type="text" name="surname" value="{{$profile->surname}}" disabled><br>
        Contact <input type="text" name="phone" value="{{$profile->phone}}"><br>
        Grupa student <input type="text" name="group" value="{{$profile->group}}" disabled><br>

        <div>
            <button type="submit" name="save_student" class="btn btn-success">Salveaza</button>
        </div>
        <br>
    </form>
    @else
        <form method="post" action="{{route('profile.save')}}" style="text-align: center">
            {{csrf_field()}}

            IDNP <input type="text" name="IDNP"><br>
            Prenume <input type="text" name="name"><br>
            Nume <input type="text" name="surname"><br>
            Contact <input type="text" name="phone"><br>
            Grupa student <input type="text" name="group"><br>

            <div>
                <button type="submit" name="save_student" class="btn btn-success">Salveaza</button>
            </div>
            <br>
        </form>
    @endif
@endsection
