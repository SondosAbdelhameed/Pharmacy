<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->user_type_id <= 3 )
            return view('admin.dashboard');
        else{
            $doctor = Doctor::where('user_doctor_id',auth()->user()->id)->first();
            return view('doctor.profile',compact('doctor'));
        }
    }
}
