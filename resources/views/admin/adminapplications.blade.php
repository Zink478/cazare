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
                        <h2> *!* - Verifică chitanța manual în storage/app/public/payments/PrenumeNume.xyz<!doctype html
                            >
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport"
                                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                <title>Document</title>
                            </head>
                            <body>
                            
                            </body>
                            </html></h2>
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
                                                <span style="color: silver">ÎN AȘTEPTARE</span>
                                            @break
                                            @case(1)
                                            <span style="color: green">APROBAT</span>
                                            @break
                                            @case(2)
                                            <span style="color: red">RESPINS</span>
                                            @break
                                    @endswitch</td>
                                    <td>@if(isset($app->payment))
                                            <span style="color: green">Achitat!</span>
                                        @else
                                            <span style="color: red">Neachitat!</span>
                                    @endif</td>

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
        <footer><h3>* - Verifică chitanța manual în storage/app/public/payments/PrenumeNume.xyz!</h3></footer>
    </section>

@endsection
