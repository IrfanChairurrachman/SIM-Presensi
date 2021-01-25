<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

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
        $courses = Course::all();

        return view('indexmk', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createmk');
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
        return view('editmk', compact('course'));
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
