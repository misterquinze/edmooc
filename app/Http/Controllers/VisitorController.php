<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function getHomepage(){
        return view('visitor/home');
    }
    public function getCourses(){
        return view('visitor/course');
    }

    public function getAbout(){
        return view('visitor/about');
    }

    public function getContact(){
        return view('visitor/contact');
    }
}
