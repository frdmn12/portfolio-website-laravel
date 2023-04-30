<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Skill extends Controller
{
    //
    function index () {
        return '<h1>Saya memiliki skill </h2>';
    }

    function detail ($skills) {
        return "<h1>Skill Utama saya adalah $skills</h1>";
    }
}
