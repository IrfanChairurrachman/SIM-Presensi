<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

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
        return view('index');
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
        // $absence = new Absence;
        // $absence->nim = $request->nim;
        // $absence->matkul = $request->matkul;
        // $absence->fakultas = $request->fakultas;
        
        // $absence->save();
        
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
