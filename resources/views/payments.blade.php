@extends('layout')
@section('title') Taxa de cazare @endsection
@section('main_content')
    @if($errors->any())
        <div class="container alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)

                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-md-12">
                        <div>
                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolore ducimus error excepturi ipsum minus, non possimus! Blanditiis ex expedita iure natus nesciunt, nobis perferendis possimus sit suscipit tempore vel!</h4>
                            <h2>Aici poti descarca avizul de plata si incarca chitanta!</h2>
                            @if(isset($student) && ($student->status == 0))
                            <a class="btn btn-info" href="{{route('payment.send')}}">Click pentru a primi avizul de plata</a>

                        </div>
                        <h2>Incarca chitanta de plata!</h2>
                        <form method="post" enctype="multipart/form-data" class="form form-vertical" action="{{route('payment.get')}}">
                            {{csrf_field()}}
                            <input type="file" name="image" required>
                            <button class="btn btn-danger mt-3" type="submit">Upload</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
