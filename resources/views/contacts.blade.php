@extends('layout')
@section('main_content')
    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-md-12">
                        <div>
                            <h1>Aici veţi cunoaşte persoanele care vor fi portarii căminului. <br></h1>

                            <table class="table table-hover w-auto">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nume</th>
                                    <th scope="col">Prenume</th>
                                    <th scope="col">Nr de contact</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->surname}}</td>
                                    <td>{{$staff->phone}}</td>
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
