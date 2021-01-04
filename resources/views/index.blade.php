@extends('layouts.main')

@section('title', 'MOOC')

@section('container')
<h1 class="mt-3">Absen</h1>

<form method="POST" action="/">
  <div class="form-group">
      <input id="nim" autocomplete="off" autofocus class="form-control" name="nim" placeholder="NIM" type="text">
  </div>
  <div class="form-group">
      <input id="password" class="form-control" name="password" placeholder="Password" type="password">
  </div>
  <select id="matkul" name="matkul" class="form-control">
      <option value="sim" selected>SIM</option>
  </select>
  <select id="fakultas" name="fakultas" class="form-control">
      <option value="fst" selected>FST</option>
  </select>
  <button type="submit" class="btn btn-primary">Konfirmasi</button>
</form>
@endsection