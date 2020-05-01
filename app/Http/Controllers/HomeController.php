<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        
        // session(['peter' => 'awesome']); //global function to set session
        $request->session()->put(['louis' => 'student']); // set session

        $result = $request->session()->get('louis'); //get session
        // $result = $request->session()->all()); //get all session

        // $request->session()->forget('louis'); //remove session
        // $request->session()->flush(); //remove all session
        
        // $request->session()->flash(['message', 'Post created successful!']); //flash session by request, second request will removed

        return $result;
        // return view('home');
    }
}
