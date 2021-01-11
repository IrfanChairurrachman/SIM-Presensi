@extends('layouts.main')

@section('title', 'Edit Presensi')

@section('container')
<h1 class="mt-3">Edit</h1>

<form method="POST" action="/dashboard/{{$absence->id}}">
    @method('patch')
    @csrf
    <div class="form-group">
        <input id="nim" autocomplete="off" autofocus class="form-control" name="nim" placeholder="NIM" type="text" value="{{ $absence->student_nim }}">
    </div>
    <select name="matkul" class="form-control">
        @foreach($courses as $course)
        <option value="{{$course->id}}">{{$course->matkul}}</option>
        @endforeach
    </select>
    <select name="fakultas" class="form-control">
        <option value="fst" selected>{{$absence->fakultas}}</option>
    </select>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection