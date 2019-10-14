<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Company;
use App\Tutor;
use App\Proficiency;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $statusValidator = $this->validator($request->all())->validate();
        //dd($statusValidator);

        $user = $this->create($request->all());
        
        return redirect('/login');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        if($data['type'] == 'student'){
            $user->role = 'student';

        }else if($data['type'] == 'company'){
            $user->role = 'company';
            
        }else if($data['type'] == 'tutor'){
            $user->role = 'tutor';
        }
        $user->save();

        
        if($data['type'] == 'tutor'){
            $tutor = Tutor::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'proficiency_id' => $data['proficiency']
            ]);
            
        }
        else{
            $company = Company::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['phone']
            ]);
            
        }
    
    }

    public function showRegistrationForm(){
        $userLogin = null;
        $proficiencies = Proficiency::all();
        $tutor = Tutor::all();
        if(Auth::user()){
            $userLogin = Auth::user();
          
        }

        return view('auth/register',[
            'userLogin' => $userLogin,
            'proficiencies' => $proficiencies,
            'tutor' => $tutor,
        ]);
    }
}
