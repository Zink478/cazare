<table class="table table-striped">
    <thead>
    <th>ID</th>
    <th>Full Name</th>
    <th>Address</th>
    <th>City</th>
    <th>Zip Code</th>
    <th>Action</th>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{$student->IDNP}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->surname}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->group}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
