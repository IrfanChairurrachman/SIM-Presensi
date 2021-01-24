@extends('layouts.main')

@section('title', 'Presensi')

@section('container')
<h1 class="mt-3">Absen</h1>

<form method="POST" action="/">
    @csrf
    <div class="form-group">
        <input id="nim" autocomplete="off" autofocus class="form-control" name="nim" placeholder="NIM" type="text">
    </div>
    <div class="form-group">
        <input class="form-control" name="password" placeholder="Password" type="password">
    </div>
    <select name="matkul" class="form-control">
        @foreach($courses as $course)
        <option value="{{$course->id}}">{{$course->matkul}}</option>
        @endforeach
    </select>
    <select name="fakultas" class="form-control">
        <option value="fst" selected>FST</option>
    </select>
    <button type="submit" class="btn btn-primary">Konfirmasi</button>
</form>
@endsection