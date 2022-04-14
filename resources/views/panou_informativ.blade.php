@extends('layout')
@section('main_content')
    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-md-12">
                        <div >
                            <h1>Aici veţi putea vizualiza lista locatarilor căminului, în caz că nu vă găsiţi în lista de jos, probabil nu aţi fost inclus în listă din anumite motive sau sunteţi exmatriculat <br></h1>
                            <p>De reţinut ! <br>
                                persoanele care vor să solicite cămin, să verifice disponibilitatea camerelor de camin facând <a href="cazare.php">Click aici</a> este nevoie să luaţi legătura cu răspunzătorii de cazare a caminului UTM. <br></p>


                            <table class="table table-hover w-auto">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nume student</th>
                                    <th scope="col">Prenume student</th>
                                    <th scope="col">Nr de tel</th>
                                    <th scope="col">Grupa</th>
                                    <th scope="col">Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->surname}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>{{$student->group}}</td>
                                        @if($student->roomNumber) <td><span style='color:green'><strong>CAZAT</strong></span></td>
                                        @else
                                            <td><span style='color:red'><strong>RESPINS/IN LISTA DE ASTEPTARE</strong></span></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
