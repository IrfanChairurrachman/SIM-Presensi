<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CourseController extends Controller
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

        return view('indexmk', compact('courses', 'user'));
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

        return view('createmk', compact('user'));
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
        // dd($request->mulai);
        $request->validate([
            'matkul' => 'required|max:30',
            'mulai' => 'required',
            'selesai' => 'required'
        ]);

        $course = new Course;
        $course->matkul = $request->matkul;
        $course->mulai = $request->mulai;
        $course->selesai = $request->selesai;
        
        $course->save();
        
        return redirect('/dashboard/mk')->with('status', 'Mata Kuliah Ditambahkan!');
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
    public function edit(Course $course)
    {
        //
        $user = auth()->user();

        
        $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $course->mulai);
        $mulai = $mulai->format('Y-m-d\\TH:i');

        $selesai = Carbon::createFromFormat('Y-m-d H:i:s', $course->selesai);
        $selesai = $selesai->format('Y-m-d\\TH:i');

        $course->mulai = $mulai;
        $course->selesai = $selesai;
        

        return view('editmk', compact('course', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $request->validate([
            'matkul' => 'required|max:30',
            'mulai' => 'required',
            'selesai' => 'required'
        ]);
        
        Course::where('id', $course->id)->update([
            'matkul' => $request->matkul,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai
        ]);

        return redirect('/dashboard/mk')->with('status', 'Mata Kuliah Terupdate');
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
        Course::destroy($id);

        return redirect('/dashboard/mk')->with('danger', 'Mata Kuliah Terhapus!');
    }
}
