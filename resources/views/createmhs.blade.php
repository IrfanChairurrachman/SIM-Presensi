@extends('layouts.master')

@section('title', 'Input Mahasiswa')

@section('name')
    <h5 class="font-bold">{{$user->name}}</h5>
    <p class="text-muted mb-0" style="font-size:80%;">{{$user->email}}</p>
@endsection

@section('isi', 'active')

@section('isiMhs', 'active')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Mahasiswa</h4>
                </div>
                <div class="card-body">
                <form class="form form-vertical" method="POST" action="/dashboard/mhs/isi">
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
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukkan Nama"
                                                id="first-name-icon"
                                                name="nama">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Jurusan</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror"
                                                placeholder="Masukkan Jurusan"
                                                id="first-name-icon"
                                                name="jurusan">
                                            <div class="form-control-icon">
                                                <i class="bi bi-journal-code"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Angkatan</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('angkatan') is-invalid @enderror"
                                                placeholder="ex. 2018"
                                                id="first-name-icon"
                                                name="angkatan">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">No HP</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('nohp') is-invalid @enderror"
                                                placeholder="ex. 082123456908"
                                                id="first-name-icon"
                                                name="nohp">
                                            <div class="form-control-icon">
                                                <i class="bi bi-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Alamat</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                                placeholder="ex. Jl.SukaRia No.21"
                                                id="first-name-icon"
                                                name="alamat">
                                            <div class="form-control-icon">
                                                <i class="bi bi-signpost-split"></i>
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