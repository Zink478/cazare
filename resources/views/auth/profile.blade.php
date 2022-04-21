@extends('layout')

@section('main_content')
    @if((auth()->user()->avatar) != NULL) <h1>DEJA AI AVATAR</h1>
    @if(isset($user->avatar))
        <img src="{{asset($user->avatar)}}" alt="">
        @endif

{{--    <img src="{{ url('storage/images/'.$user->avatar) }}" alt="" title="" />--}}
{{--    <img src="{{ asset($post->image) }}" />--}}
    @else
    <form method="post" enctype="multipart/form-data" class="form form-vertical" action="{{route('save.avatar')}}">
        {{csrf_field()}}
        <h2> Alege o fotografie de profil! </h2>
        <div class="col-2 text-center">
            <div>
                <div class="form-group">
                    <input id="avatar" name="image" type="file" required>
                </div>
            </div>
            <div>
                <small>Select file < 1500 KB</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
   @endif
    @if(isset($profile))

    <form method="post" action="{{route('profile.update', [ 'student' => $profile->id ])}}" style="text-align: center">
        {{csrf_field()}}

        IDNP <input type="text" name="IDNP" value="{{ $profile->IDNP }}"><br>
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
        <form method="post" action="{{route('profile.save', ['user_id' => auth()->user()->id])}}" style="text-align: center">
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
