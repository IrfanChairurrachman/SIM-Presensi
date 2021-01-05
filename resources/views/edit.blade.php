@extends('layouts.main')

@section('title', 'Edit Presensi')

@section('container')
<h1 class="mt-3">Edit</h1>

<form method="POST" action="/dashboard">
    @method('patch')
    @csrf
    <div class="form-group">
        <input id="nim" autocomplete="off" autofocus class="form-control" name="nim" placeholder="NIM" type="text" value="{{ $absence->nim }}">
    </div>
    <select name="matkul" class="form-control">
        <option value="sim" selected>{{$absence->matkul}}</option>
    </select>
    <select name="fakultas" class="form-control">
        <option value="fst" selected>{{$absence->fakultas}}</option>
    </select>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection