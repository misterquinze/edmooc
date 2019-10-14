<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{   
    /**  
     * Get dashboard page.
     *
     * @return mixed
     * 
     * 
    */
    public function getDashboard()
    {
        $userLogin = Auth::user();

        return view('dashboard/home', ['userLogin'=>$userLogin]);
    }

    /* to get setting page
    */
    public function getSettings() 
    {
        $userLogin = Auth::user();

        return view('dashboard/settings', ['userLogin'=>$userLogin]);
    }

}
