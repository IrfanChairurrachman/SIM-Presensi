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
        $absences = Absence::all();
        // $absences = [];
        // dd($absences);
        return view('newdash', compact('absences'));

        // return view('absencedash');
    }

    public function mhsindex()
    {
        // $absences = Absence::all();
        // $absences = [];
        // dd($absences);
        // return view('newdash', compact('absences'));

        return view('indexmhs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('createabsen', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(!Student::find($request->nim)){
            return redirect('/')->with('danger', 'NIM Tidak Tercatat di Database!');
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
            return redirect('/')->with('danger', 'Password Salah!');
        }
        elseif(!$now->isSameAs('w', $mulai2)){
            return redirect('/')->with('danger', 'Bukan Hari Jadwal Matkul!');
        } 
        elseif(!$now->between($mulai, $selesai, true)){
            return redirect('/')->with('danger', 'Bukan Jam Jadwal Matkul!');
        }

        $absence = new Absence;
        $absence->student_nim = $request->nim;
        $absence->course_id = $request->matkul;
        $absence->fakultas = $request->fakultas;
        
        $absence->save();
        
        return redirect('/')->with('status', 'Data Tercatat!');
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
        $courses = Course::all();
        return view('newedit', compact('absence', 'courses'));

        // return view('edit');
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
        Absence::where('id', $absence->id)->update([
            // 'student_nim' => $request->nim,
            'course_id' => $request->matkul,
            'fakultas' => $request->fakultas
        ]);

        return redirect('/dashboard')->with('status', 'Data Terupdate');
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
        Absence::destroy($id);

        return redirect('/dashboard')->with('danger', 'Data Terhapus!');
    }
}
