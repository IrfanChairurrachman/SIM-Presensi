@extends('layouts.master')

@section('title', 'Dashboard')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Visit</h4>
                </div>
                <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Matkul</th>
                            <th>Fakultas</th>
                            <th>Tercatat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($absences as $absence)
                        <tr>
                            <td>{{$absence->student_nim}}</td>
                            <td>{{$absence->course->matkul}}</td>
                            <td>{{$absence->fakultas}}</td>
                            <td>{{$absence->tercatat}}</td>
                            <td>
                                <span class="badge">
                                <form action="/dashboard/{{$absence->id}}" method="GET" class="form">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>Dale</td>
                            <td>fringilla.euismod.enim@quam.ca</td>
                            <td>0500 527693</td>
                            <td>New Quay</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection