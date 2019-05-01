<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function getCourse(){
        return view('tutor/course');
    }
}
