<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
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

        
        foreach($courses as $course){
            $hari = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai);
            $hari = $hari->format('l');

            $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai)->toTimeString();
            $selesai = Carbon::createFromFormat('Y-m-d H:i:s', $course->selesai)->toTimeString();

            $result = $hari . ' ' . $mulai;

            $course->mulai = $result;
            $course->selesai = $selesai;
        }

        return view('index', compact('courses'));
    }

    public function adminindex()
    {
        $user = auth()->user();

        // var_dump($user->email);

        $absences = Absence::all();
        
        return view('newdash', compact('absences', 'user'));

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
        $user = auth()->user();

        $courses = Course::all();

        foreach($courses as $course){
            $hari = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai);
            $hari = $hari->format('l');

            $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai)->toTimeString();
            $selesai = Carbon::createFromFormat('Y-m-d H:i:s', $course->selesai)->toTimeString();

            $result = $hari . ' ' . $mulai;

            $course->mulai = $result;
            $course->selesai = $selesai;
        }

        return view('createabsen', compact('courses', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nim' => 'required|max:11',
            'password' => 'required|max:50'
        ]);

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
        
        $absence->save();
        
        return redirect('/')->with('status', 'Data Tercatat!');
    }

    public function adminstore(Request $request)
    {
        $request->validate([
            'nim' => 'required|max:11',
            'password' => 'required|max:50',
        ]);
        
        if(!Student::find($request->nim)){
            return redirect('/dashboard/absen/isi')->with('danger', 'NIM Tidak Tercatat di Database!');
        }
        
        if(!$request->waktu){
            $now = Carbon::now('+07:00');
        } else{
            $now = Carbon::createFromFormat('Y-m-d\\TH:i', $request->waktu)->toTimeString();
            $now = Carbon::createFromFormat('H:i:s', $now, '+07:00');
        }
        
        $student = Student::find($request->nim);
        $course = Course::find($request->matkul);
        
        // Pengaturan format waktu

        $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai)->toTimeString();
        $selesai = Carbon::createFromFormat('Y-m-d H:i:s', $course->selesai)->toTimeString();

        $mulai = Carbon::createFromFormat('H:i:s', $mulai, '+07:00');
        $selesai = Carbon::createFromFormat('H:i:s', $selesai, '+07:00');

        $mulai1 = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai, '+07:00');

        if($student->password != $request->password){
            return redirect('/dashboard/absen/isi')->with('danger', 'Password Salah!');
        }
        elseif(!$now->isSameAs('w', $mulai1) && !$request->waktu){
            return redirect('/dashboard/absen/isi')->with('danger', 'Bukan Hari Jadwal Matkul!');
        } 
        elseif(!$now->between($mulai, $selesai, true)){
            return redirect('/dashboard/absen/isi')->with('danger', 'Bukan Jam Jadwal Matkul!');
        }

        $absence = new Absence;
        $absence->student_nim = $request->nim;
        $absence->course_id = $request->matkul;
        
        $absence->save();
        
        return redirect('/dashboard')->with('status', 'Data Tercatat!');
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
        $user = auth()->user();

        $courses = Course::all();
        return view('newedit', compact('absence', 'courses', 'user'));

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
            // 'course_id' => $request->matkul,
            'catatan' => $request->catatan
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
