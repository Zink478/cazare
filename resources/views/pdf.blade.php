@extends('layout')
@section('main_content')
    <section class="slider_section">
        <div class="container">
            <div class="row">
 <div class="col-md-12">
     <a class="btn btn-danger" href="{{route('student.pdfexport')}}"> CLICK PENTRU A DESCĂRCA FIȘIERUL PDF</a>
<table class="table table-striped">
    <thead>
    <th>IDNP</th>
    <th>Nume</th>
    <th>Prenume</th>
    <th>Telefon</th>
    <th>Grupa</th>
    <th>Camera</th>
    <th>Status</th>
    <th>Cazat/Depus cerere</th>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{$student->IDNP}}</td>
            <td>{{$student->surname}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->group}}</td>
            <td>{{$student->roomNumber}}</td>
            <td>{{$student->status}}</td>
            <td>{{$student->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
 </div>
            </div>
        </div>
    </section>
@endsection
