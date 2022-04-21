@extends('admin.adminlayout')
@section('title') Administrarea cererilor @endsection
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
            <h1> Administrarea cererilor</h1>
                        <table class="table table-striped table-dark">
                            <thead>
                            <tr>
                                <th scope="col">IDNP</th>
                                <th scope="col">Nume</th>
                                <th scope="col">Prenume</th>
                                <th scope="col">Camera</th>
                                <th scope="col">Status</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                            </tr>
                            </thead>
                            @foreach($applications as $app)
                                <tr>
                                    <td>{{$app->IDNP}}</td>
                                    <td>{{$app->student->name}}</td>
                                    <td>{{$app->student->surname}}</td>
                                    <td>{{$app->roomNumber}}</td>
                                    <td>@switch($app->status)
                                            @case(0)
                                                <span style="color: silver">IN ASTEPTARE</span>
                                            @break
                                            @case(1)
                                            <span style="color: green">APROBAT</span>
                                            @break
                                            @case(2)
                                            <span style="color: red">RESPINS</span>
                                            @break
                                    @endswitch</td>
                                    <td>
                                    <a class="btn btn-success" href="{{route('accept.app', ['IDNP' => $app->IDNP])}}">APROBĂ</a></td>
                                    <td>
                                        <a class="btn btn-danger" href="{{route('decline.app', ['IDNP' => $app->IDNP])}}">RESPINGE</a>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </section>

@endsection
