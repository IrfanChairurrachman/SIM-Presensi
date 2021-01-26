@extends('layouts.master')

@section('title', 'Mahasiswa')

@section('name')
    <h5 class="font-bold">{{$user->name}}</h5>
    <p class="text-muted mb-0" style="font-size:80%;">{{$user->email}}</p>
@endsection

@section('mahasiswa', 'active')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Mahasiswa</h4>
                </div>
                <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th>No HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->nim}}</td>
                            <td>{{$student->nama}}</td>
                            <td>{{$student->jurusan}}</td>
                            <td>{{$student->angkatan}}</td>
                            <td>{{$student->nohp}}</td>
                            <td style="width:195px">
                                <span class="badge">
                                <form action="/dashboard/mhs/{{$student->nim}}" method="GET" class="form">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                </form>
                                </span>
                                <span class="badge">
                                <form action="/dashboard/mhs/{{$student->nim}}" method="POST" class="form">
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