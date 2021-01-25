@extends('layouts.master')

@section('title', 'Dashboard')

@section('mahasiswa', 'active')

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
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->nim}}</td>
                            <td>{{$student->password}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection