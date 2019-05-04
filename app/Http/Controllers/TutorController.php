<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    public function getMyCourse(){
        $userLogin = Auth::user();

        return view('dashboard/tutor/course',[
            'userLogin' => $userLogin
        ]);
    }
}
