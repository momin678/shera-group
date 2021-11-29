<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function home(Request $request){
        $sliders = DB::table('home_slider')->get();
        return view('frontend.index', compact('sliders'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(Auth::user()->user_type == "user"){
            return redirect()->route('user.dashboard');
        }elseif(Auth::user()->user_type == "admin"){
            return redirect()->route('admin.dashboard');
        }
    }
    public function about(Request $request){
        return view('frontend.about');
    }
    public function quality_assurance(Request $request){
        return view('frontend.quality-assurance');
    }
    public function sister_concerns(Request $request){
        return view('frontend.sister-concerns');
    }
    public function national_presence(Request $request){
        return view('frontend.national-presence');
    }
    public function global_presence(Request $request){
        return view('frontend.global-presence');
    }
    public function contact(Request $request){
        return view('frontend.contact');
    }
}
