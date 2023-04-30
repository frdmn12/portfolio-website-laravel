<?php

namespace App\Http\Controllers;

use App\Models\education;
use App\Models\project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class landingController extends Controller
{
    //
    public function index()
    {
        $data_education = Education::orderBy('nama', 'asc')
            ->select('nama', 'jurusan', 'start_date', 'end_date', 'desc')
            ->get()
            ->map(function ($education) {
                $education->start_date = Carbon::parse($education->start_date);
                $education->end_date = Carbon::parse($education->end_date);
                return $education;
            });


        $data_project = project::orderBy('judul', 'asc')
            ->select('judul', 'gambar', 'desc', 'link')
            ->get();



        return view('welcome', [
            'data_education' => $data_education,
            'data_project' => $data_project
        ]);
    }
}
