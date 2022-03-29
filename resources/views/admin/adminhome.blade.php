@extends('admin.adminlayout')

@section('title') Administrarea caminelor @endsection
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

    @if(isset($edited) && $edited)
            <h2>
                S-a modificat cu succes!
            </h2>
        @endif
    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-md-12">
                        <div>
                            <h1>Aici se vor introduce studentii <br></h1>

                            <table class="table table-hover w-auto centertable" style="border-style: solid;">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">IDNP</th>
                                    <th scope="col">Nume</th>
                                    <th scope="col">Prenume</th>
                                    <th scope="col">Nr de contact</th>
                                    <th scope="col">Grupa student</th>
                                    <th colspan="2" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->IDNP}}</td>
                                    <td>{{$student->surname}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->group}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('student.edit', ['student' => $student->id])}}">Editeaza</a>
                                    </td>

                                    <td>
                                        <a class="btn btn-danger"  href={{route('student.delete', ['id' => $student->id])}}>Sterge</a>

                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h3 style="text-align: center;">Introducerea datelor:</h3>

                            @if(isset($editStudent))
                                <form method="post" action="{{route('student.update', [ 'student' => $editStudent->id ])}}" style="text-align: center">
                                    {{csrf_field()}}

                                    IDNP <input type="text" name="IDNP" value="{{ $editStudent->IDNP }}"><br>
                                    Prenume <input type="text" name="name" value="{{$editStudent->name}}"><br>
                                    Nume <input type="text" name="surname" value="{{$editStudent->surname}}"><br>
                                    Contact <input type="text" name="phone" value="{{$editStudent->phone}}"><br>
                                    Grupa student <input type="text" name="group" value="{{$editStudent->group}}"><br>

                                    <div>
                                        <button type="submit" name="save_student" class="btn btn-success">Salveaza</button>
                                    </div>
                                    <br>
                                </form>
                        </div>
                        <br>

                            @else
                                <form method="post" action="{{route('student.store')}}" style="text-align: center">
                                    {{csrf_field()}}

                                    IDNP <input type="text" name="IDNP"><br>
                                    Prenume <input type="text" name="name" ><br>
                                    Nume <input type="text" name="surname"><br>
                                    Contact <input type="text" name="phone"><br>
                                    Grupa student <input type="text" name="group"><br>

                                    <div>
                                        <button type="submit" name="save_student" class="btn btn-success">Adauga</button>
                                    </div>
                                    <br>
                                </form>

                                </div>
                                <br>
                            </form>
                        @endif
                            <hr>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
