@extends('layouts.master')

@section('title', 'Mata Kuliah')

@section('matkul', 'active')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Mata Kuliah</h4>
                </div>
                <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Mata Kuliah</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->matkul}}</td>
                            <td>{{$course->mulai}}</td>
                            <td>{{$course->selesai}}</td>
                            <td>
                                <span class="badge">
                                <form action="/dashboard/mk/{{$course->id}}" method="GET" class="form">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                </form>
                                </span>
                                <span class="badge">
                                <form action="/dashboard/mk/{{$course->id}}" method="POST" class="form">
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