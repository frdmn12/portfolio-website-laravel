<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = education::orderBy('id', 'asc')->get();
        $data = project::orderBy('id', 'asc')->get();
        return view('dashboard.project.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $gambar_ekstensi = $gambar_file->getClientOriginalExtension();
            $gambar_baru = date('ymdhis') . ".$gambar_ekstensi";
            $gambar_file->move(public_path('images'), $gambar_baru);
        } else {
            $gambar_baru = null;
        }

        $project = new project;
        $project->judul = $request->input('judul');
        $project->desc = $request->input('desc');
        $project->link = $request->input('link');
        $project->gambar = $gambar_baru;
        $project->save();

        return redirect()->route('project.index')->with('success', 'Berhasil menambahkan data');
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
        $data = project::where('id', $id)->first();
        return view('dashboard.project.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'gambar' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_baru = date('ymdhis') . ".$gambar_ekstensi";
            $gambar_file->move(public_path('images'), $gambar_baru);

            $project->gambar = $gambar_baru;
        }

        $project->judul = $validatedData['judul'];
        $project->desc = $request->input('desc');
        $project->link = $validatedData['link'];
        $project->save();

        return redirect()->route('project.index')->with('success', 'Data berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = project::find($id);

        if ($project->gambar != null) {
            File::delete(public_path('images/' . $project->gambar));
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Berhasil menghapus data');
    }
}
