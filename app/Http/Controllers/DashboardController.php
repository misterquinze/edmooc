<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard(){
        return view('dashboard/home');
    }
    
    public function getFavorite(){
        return view('dashboard/favorite');
    }

    public function getMyCourse(){
        return view('dashboard/course');
    }

    public function getTransaction(){
        return view('dashboard/transaction');
    }

    public function getSettings(){
        return view('dashboard/settings');
    }

}
