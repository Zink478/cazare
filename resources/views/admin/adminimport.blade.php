@extends('admin.adminlayout')

@section('main_content')
    <div class="container">

        <div class="panel panel-primary">
            <div class="panel-heading"><h2>Alege fisierul pentru import</h2></div>
            <div class="panel-body">

                <form action="{{ route('student.fileupload') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="file" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
