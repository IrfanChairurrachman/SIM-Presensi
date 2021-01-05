@extends('layouts.main')

@section('title', 'Dashboard')

@section('container')
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <h2>Daftar Mahasiswa</h2>
  @foreach($absences as $absence)
    <div class="list-group my-3">
        <a href="{{$absence->id}}" class="list-group-item list-group-item-action">
            {{$absence->nim}}, {{$absence->matkul}}, {{$absence->fakultas}}
        </a>
        <ul class="list-group list-group-horizontal-lg">
          <form action="/admin/{{ $absence->id }}/edit" method="POST" class="d-inline">
            <button type="submit" class="btn btn-info">Edit absence</button>
          </form>
          <form action="/dashboard/{{ $absence->id }}" method="POST" class="d-inline">
            <!-- @method('delete') -->
            @csrf
            <button type="submit" class="btn btn-danger">Delete absence</button>
          </form>
        </ul>
    </div>
  @endforeach
@endsection