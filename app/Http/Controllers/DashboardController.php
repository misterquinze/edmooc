<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getDashboard(){
        $userLogin = Auth::user();

        return view('dashboard/home',[
            'userLogin' => $userLogin
        ]);
    }

    public function getSettings(){
        $userLogin = Auth::user();

        return view('dashboard/settings',[
            'userLogin' => $userLogin
        ]);
    }

}
