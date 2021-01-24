<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Vertical 1 Column - Mazer</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">

    <link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-1">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-person-badge-fill fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Admin</h6>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
        @endif
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SIABMAS ABSENSI</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" method="POST" action="/">
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
                                                <input type="password" class="form-control"
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
                                                <option value="{{$course->id}}">{{$course->matkul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Fakultas</label>
                                            <select class="choices form-select" name="fakultas">
                                                <option value="fst">Sains dan Teknologi</option>
                                                <option value="fupi">Filsafat dan Pemikiran Islam</option>
                                            </select>
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
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/choices.js/choices.min.js"></script>
    <script src="assets/js/extensions/sweetalert2.js"></script>
    <script src="assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="assets/js/main.js"></script>

</body>

</html>