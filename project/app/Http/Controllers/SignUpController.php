<?php

namespace App\Http\Controllers;

use App\Category;
use App\Visitor;
use Illuminate\Http\Request;
use Session;

class SignUpController extends Controller
{
    public function index()
    {
        return view('front.user.sign-up',[
            'categories'  =>Category::where('publication_status',1)->get()
        ]);
    }
    public function newSignUp(Request $request)
    {
        Visitor::saveVisitorInfo($request);
        return redirect('/');
    }
    public function visitorLogout(Request $request)
    {
        Session::forget('visitorId');
        Session::forget('visitorName');
        return redirect('/');
    }
    public function visitorLogin(Request $request)
    {
        return view('front.user.sign-in',[
            'categories'  =>Category::where('publication_status',1)->get()
        ]);
    }
    public function visitorSignIn(Request $request)
    {
        $visitor=Visitor::where('email_address',$request->email_address)->first();
        if($visitor){
            if (password_verify($request->password, $visitor->password)) {
                Session::put('visitorId',$visitor->id);
                Session::put('visitorName',$visitor->first_name.' '.$visitor->last_name);

                return redirect('/');
            } else {
                return redirect('/visitor-login')->with('message','Sorry! Invalid Password ');
            }
        }
        else {
            return redirect('/visitor-login')->with('message','Sorry! This email address does not exist!!!');
        }
    }
    public function emailCheck($email)
    {
        $visitor = Visitor::where('email_address',$email)->first();
        if ($visitor)
            echo "Sorry! Email already exists";
        else
            echo "Email OK!!!";
    }
}
