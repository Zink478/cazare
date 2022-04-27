<head>
    <style>
        table, thead, td{
            border:1px solid black;
        }
        td {
            padding: 5px;
            padding-right: 30px;
            padding-left: 30px;
            text-align: center;
        }
    </style>
</head>
<table>
    <thead>
    <th>IDNP</th>
    <th>Nume</th>
    <th>Prenume</th>
    <th>Telefon</th>
    <th>Grupa</th>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{$student->IDNP}}</td>
            <td>{{$student->surname}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->group}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
