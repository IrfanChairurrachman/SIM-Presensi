@extends('layouts.master')

@section('title', 'Edit Absen')

@section('form', 'active')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Presensi</h4>
                </div>
                <div class="card-body">
                <form class="form form-vertical" method="POST" action="/dashboard/{{$absence->id}}">
                    @method('patch')
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">NIM</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan NIM"
                                                id="first-name-icon"
                                                name="nim"
                                                value="{{ $absence->student_nim }}"
                                                disabled>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control"
                                                id="first-name-icon"
                                                name="nama"
                                                value="{{ $absence->student->nama }}"
                                                disabled>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Mata Kuliah</label>
                                        <select class="choices form-select" name="matkul" disabled>
                                            <option value="{{$absence->course_id}}">{{$absence->course->matkul}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Tercatat</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control"
                                                id="first-name-icon"
                                                name="tercatat"
                                                value="{{ $absence->tercatat }}"
                                                disabled>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="">Catatan</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea"
                                            name="catatan">{{$absence->catatan}}</textarea>
                                        <label for="floatingTextarea">Catatan</label>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Edit</button>
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