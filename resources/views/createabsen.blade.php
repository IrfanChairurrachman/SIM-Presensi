@extends('layouts.master')

@section('title', 'Input Absen')

@section('name')
    <h5 class="font-bold">{{$user->name}}</h5>
    <p class="text-muted mb-0" style="font-size:80%;">{{$user->email}}</p>
@endsection

@section('isi', 'active')

@section('isiAbsen', 'active')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Presensi</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="/dashboard/absen/isi">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">NIM</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('nim') is-invalid @enderror"
                                                placeholder="Masukkan NIM"
                                                id="first-name-icon"
                                                name="nim">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="password-id-icon">Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" id="password-id-icon"
                                                name="password">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Mata Kuliah</label>
                                        <select class="choices form-select" name="matkul">
                                            @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->matkul}} ({{$course->mulai}} - {{$course->selesai}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Waktu</label>
                                        <div class="position-relative">
                                            <input type="datetime-local" class="form-control"
                                                id="first-name-icon"
                                                name="waktu">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection