@extends('layouts.main')

@section('title', 'Dashboard')

@section('container')
  <h2>Daftar Mahasiswa</h2>
  @foreach($absences as $absence)
    <div class="list-group my-3">
        <a href="{{$absence->id}}" class="list-group-item list-group-item-action">
            {{$absence->student_nim}}, {{$absence->course->matkul}}, {{$absence->fakultas}}, {{$absence->tercatat}}
        </a>
        <ul class="list-group list-group-horizontal-lg">
          <form action="/dashboard/{{ $absence->id }}/edit" method="GET" class="d-inline">
            <button type="submit" class="btn btn-info">Edit absence</button>
          </form>
          <form action="/dashboard/{{ $absence->id }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete absence</button>
          </form>
        </ul>
    </div>
  @endforeach
@endsection