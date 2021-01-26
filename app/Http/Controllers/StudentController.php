<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();

        $students = Student::all();

        return view('indexmhs', compact('students', 'user'));
        // return view('indexmhs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = auth()->user();

        return view('createmhs', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $student = new Student;
        $student->nim = $request->nim;
        $student->nama = $request->nama;
        $student->jurusan = $request->jurusan;
        $student->angkatan = $request->angkatan;
        $student->nohp = $request->nohp;
        $student->alamat = $request->alamat;
        $student->password = $request->password;
        
        $student->save();

        return redirect('/dashboard/mhs')->with('status', 'Mahasiswa Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $user = auth()->user();

        return view('editmhs', compact('student', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        Student::where('nim', $student->nim)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'password' => $request->password
        ]);

        return redirect('/dashboard/mhs')->with('status', 'Mahasiswa Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Student::destroy($id);

        return redirect('/dashboard/mhs')->with('danger', 'Mahasiswa Terhapus!');
    }
}
