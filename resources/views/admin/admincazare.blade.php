@extends('admin.adminlayout')
@section('title') Cazarea studentilor @endsection
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
                        <div >
                            <h3>Introducerea studentului într-o cameră<br> <em>Studenţii care nu sunt cazataţi, sunt numiţi ,,în lista de aşteptare/respinşi,,</em></h3>
                            <p>! Doar adminul poate să cazeze mai muli studenţi într-o cameră, indiferent de nr maxim. <br> ! Un student poate fi atribuit doar unei singure camere</p>


                            <table class="table table-hover w-auto centertable" style="border-style: solid;">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">IDNP</th>
                                    <th scope="col">Nume student</th>
                                    <th scope="col">Prenume student</th>
                                    <th scope="col">Grupa student</th>
                                    <th scope="col">Nr camerei</th>
                                    <th scope="col">Etajul</th>
                                    <th scope="col">Data sosire</th>
                                    <th scope="col"></th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($full as $student)
                                <tr>

                                    <td>{{$student->IDNP}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->surname}}</td>
                                    <td>{{$student->group}}</td>
                                    <td>{{$student->roomNumber}}</td>
                                    <td>{{$student->roomLocation}}</td>
                                <td>DATA SOSIRE(OPTIONAL)</td>
                                    <td>
{{--                                   <a class='btn btn-danger' href="inregistrari.php?del_inregistrare2=<?php echo $row['IDNP_student']; ?> ">Elimină</a>--}}
                                        <a class='btn btn-danger' href="{{route('record.delete', ['id'=>$student->IDNP])}}">Elimină</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                            <h3 style="text-align: center;">Introducerea datelor:</h3>
                            <form method="post" action="{{route('record.store')}}">
                                {{csrf_field()}}

                                <div>Nume Prenume student:

                                    <select  name="IDNP">
                                    @foreach ($students as $student)
{{--                                        @if ($student == NULL)--}}
{{--                                           <option value='' disabled>Student</option>--}}
{{--                                        @endif--}}
{{--                                            $id_=$rows['IDNP_student'];--}}
{{--                                            $nume=$rows['nume_student'];--}}
{{--                                            $prenume=$rows['prenume_student'];--}}
                                            <option  value="{{$student->IDNP}}" name="{{$student->IDNP}}">{{$student->name}} {{$student->surname}}</option>


                                @endforeach
                                    </select><br>
                                    <div>

                                        <div>Camera
                                            <select  name="roomNumber">
                                               @foreach($rooms as $room)
                                                   @if($room == NULL)
                                                   <option value='' disabled>Camere</option>
                                                    @endif
                                                    <option  value="{{$room->roomNumber}}" name="{{$room->roomNumber}}"> {{$room->roomNumber}}</option>";
                                            </optgroup>
                                            @endforeach
                                            </select><br>
                                            <div>
                          <button type="submit" name="save_inreg" class="btn btn-success">Adauga</button>

                                <br>
                            </form>
                            <hr>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
