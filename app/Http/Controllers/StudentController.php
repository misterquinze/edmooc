<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function getFavorite(){
        $userLogin = Auth::user();

        return view('dashboard/student/favorite',[
            'userLogin' => $userLogin
        ]);
    }

    public function getMyCourse(){
        $userLogin = Auth::user();

        return view('dashboard/student/course',[
            'userLogin' => $userLogin
        ]);
    }

    public function getTransaction(){
        $userLogin = Auth::user();
        
        return view('dashboard/student/transaction',[
            'userLogin' => $userLogin
        ]);
    }
}
