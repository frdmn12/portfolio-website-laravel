<?php

namespace App\Http\Controllers;

use App\Models\education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = education::orderBy('id', 'asc')->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('start_date', $request->start_date);
        Session::flash('end_date', $request->end_date);
        Session::flash('desc', $request->desc);

        $request->validate(
            [
                'nama' => 'required',
                'start_date' => 'required'
            ],
            [
                'nama.required' => 'Nama Sekolah wajib diisi',
                'start_date.required' => 'Tanggal Mulai wajib diisi'
            ]
        );

        $data = [
            'nama'=> $request->nama,
            'jurusan'=> $request->jurusan,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date ? $request->end_date : null,
            'desc'=> $request->desc
        ];
        education::create($data);

        return redirect()->route('education.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = education::where('id', $id)->first();
        return view('dashboard.education.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'nama' => 'required',
                'start_date' => 'required'
            ],
            [
                'nama.required' => 'Nama Sekolah wajib diisi',
                'start_date.required' => 'Tanggal Mulai wajib diisi'
            ]
        );

        $data = [
            'nama'=> $request->nama,
            'jurusan'=> $request->jurusan,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'desc'=> $request->desc
        ];
        education::where('id', $id)->update($data);

        return redirect()->route('education.index')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        education::where('id', $id)->delete();
        return redirect()->route('education.index')->with('success', 'Berhasil menghapus data');
    }
}
