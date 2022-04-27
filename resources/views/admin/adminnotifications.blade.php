@extends('admin.adminlayout')
@section('title') Notificari @endsection
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
                    <div class="col-md-4">
                        <h1> Trimite notificari </h1>

                        <table class="table table-striped">
                            <tr>
                                <td class="success">Email</td>
                            </tr>

                                @foreach($emails as $email)
                                <tr>
                                   <td> {{ $email[0]['email'] }}</td>
                                </tr>
                                @endforeach

                        </table>
                        <a class="btn btn-info" href="{{route('email.push')}}"> Trimite e-mail catre toti</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <form method="post" action="{{route('sms.student')}}">
                        {{csrf_field()}}
                        <select class="form-select form-select-lg mb-3" name="idnp">
                            @foreach($studentsForSms as $student)
                            <option value="{{$student->IDNP}}" class="">
                                {{$student->name}}
                                {{$student->surname}}
                                {{$student->group}}
                            </option>
                                @endforeach
                        </select>
                            <div class="form-group">
                                <label for="message">Introdu mesajul SMS</label>
                                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                            </div>
                        <button type="submit" class="btn btn-success"> Trimite SMS</button>
                    </form>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </section>
@endsection
