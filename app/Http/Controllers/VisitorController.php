<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function getHomepage(){
        $userLogin = Auth::user();

        return view('visitor/home',[
            'userLogin' => $userLogin
        ]);
    }

    public function getCourses(){
        $userLogin = Auth::user();

        return view('visitor/course',[
            'userLogin' => $userLogin
        ]);
    }

    public function getAbout(){
        $userLogin = Auth::user();

        return view('visitor/about',[
            'userLogin' => $userLogin
        ]);
    }

    public function getContact(){
        $userLogin = Auth::user();

        return view('visitor/contact',[
            'userLogin' => $userLogin
        ]);
    }
}
