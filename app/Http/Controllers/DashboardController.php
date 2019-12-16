<?php

namespace App\Http\Controllers;

use App\Enrollment;
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
        
        $enrollment = Enrollment::where('user_id', '=', Auth::id())->get();
        
        //dd($enrollment);
        return view('dashboard/home', [
            'userLogin'=>$userLogin,
            'enrollment'=>$enrollment
        ]);
    }

    /* to get setting page
    */
    public function getSettings() 
    {
        $userLogin = Auth::user();

        return view('dashboard/settings', ['userLogin'=>$userLogin]);
    }

}
