@extends('layouts.master')

@section('title', 'Edit Mata Kuliah')

@section('form', 'active')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Mata Kuliah</h4>
                </div>
                <div class="card-body">
                <form class="form form-vertical" method="POST" action="/dashboard/mk/{{$course->id}}">
                    @method('patch')
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Mata Kuliah</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control"
                                                placeholder="Nama Mata Kuliah"
                                                id="first-name-icon"
                                                name="matkul"
                                                value="{{$course->matkul}}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Mulai ( {{$course->mulai}} )</label>
                                        <div class="position-relative">
                                            <input type="datetime-local" class="form-control"
                                                id="first-name-icon"
                                                name="mulai"
                                                value="{{$course->mulai}}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Selesai ( {{$course->selesai}} )</label>
                                        <div class="position-relative">
                                            <input type="datetime-local" class="form-control"
                                                id="first-name-icon"
                                                name="selesai"
                                                value="{{$course->selesai}}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar"></i>
                                            </div>
                                        </div>
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