@extends('layouts.master')

@section('title', 'Dashboard')

@section('dashboard', 'active')

@section('name')
    <h5 class="font-bold">{{$user->name}}</h5>
    <p class="text-muted mb-0" style="font-size:80%;">{{$user->email}}</p>
@endsection

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Presensi</h4>
                </div>
                <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Matkul</th>
                            <th>Tercatat</th>
                            <th>Catatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($absences as $absence)
                        <tr>
                            <td>{{$absence->student_nim}}</td>
                            <td>{{$absence->student->nama}}</td>
                            <td>{{$absence->course->matkul}}</td>
                            <td>{{$absence->tercatat}}</td>
                            <td>{{$absence->catatan}}</td>
                            <td style="width:195px">
                                <span class="badge">
                                <form action="/dashboard/{{$absence->id}}" method="GET" class="form">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                </form>
                                </span>
                                <span class="badge">
                                <form action="/dashboard/{{$absence->id}}" method="POST" class="form">
                                @method('delete')
                                @csrf
                                    <button type="submit" class="btn btn-danger me-1 mb-1">Delete</button>
                                </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection