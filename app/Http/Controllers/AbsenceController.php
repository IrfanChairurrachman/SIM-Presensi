<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('index', compact('courses'));
    }

    public function adminindex()
    {
        // $absences = Absence::all();
        $absences = [];
        return view('absencedash', compact('absences'));

        // return view('absencedash');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if(!Student::find($request->nim)){
            return redirect('/')->with('status', 'NIM Tidak Tercatat di Database!');
        }

        $student = Student::find($request->nim);
        $course = Course::find($request->matkul);
        
        // Pengaturan format waktu
        $now = Carbon::now('+07:00');
        $mulai1 = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai)->toTimeString();
        $selesai1 = Carbon::createFromFormat('Y-m-d H:i:s', $course->selesai)->toTimeString();
        $mulai = Carbon::createFromFormat('H:i:s', $mulai1, '+07:00');
        $selesai = Carbon::createFromFormat('H:i:s', $selesai1, '+07:00');
        $mulai2 = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai, '+07:00');

        if($student->password != $request->password){
            return redirect('/')->with('status', 'Password Salah!');
        }
        elseif(!$now->isSameAs('w', $mulai2)){
            return redirect('/')->with('status', 'Bukan Hari Jadwal Matkul!');
        } 
        elseif(!$now->between($mulai, $selesai, true)){
            return redirect('/')->with('status', 'Bukan Jam Jadwal Matkul!');
        }

        $absence = new Absence;
        $absence->student_nim = $request->nim;
        $absence->course_id = $request->matkul;
        $absence->fakultas = $request->fakultas;
        
        $absence->save();
        
        return redirect('/')->with('status', 'Anggap aja data masuk!');
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
    public function edit(Absence $absence)
    {
        //
        // return view('edit', compact('absence'));

        return view('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        //
        // Absence::where('id', $absence->id)->update([
        //     'nim' => $request->nim,
        //     'matkul' => $request->matkul,
        //     'fakultas' => $request->fakultas
        // ]);

        return redirect('/dashboard')->with('status', 'Anggap aja terupdate');
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
        
        // Absence::destroy($id);

        return redirect('/dashboard')->with('status', 'Anggap aja terhapus!');
    }
}
