<?php

namespace App\Http\Controllers;

use App\Mail\MemberPassword;
use App\Models\Exam;
use App\Models\Lesson;
use App\Models\Member;
use Auth;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            'lessons' => Lesson::where('status', true)->get()
        ]);
    }
    public function sendPassword(Request $request)
    {        // get member by email
        $member = Member::where('email',  $request->email)->first();
        if ($member == null) {
            return 'ไม่พบอีเมล ' . $request->email . ' ในระบบ';
        } else {
            // Mail::to($member->email)->send(new MemberPassword($member));
            Mail::to('preedarat.jut@gmail.com')->send(new MemberPassword($member));
            return true;
        }
        // return json_encode($member);
    }

    public function pdf()
    {
        $date = Exam::where(['memberId' =>  Auth::user()->id, 'isPass' => true])->orderBy('created_at')->first();
        $data = array('name' => Auth::user()->name, 'date' => $date->created_at);
        // $pdf = PDF::loadView('pdf', $data);
        $pdf = Pdf::loadView('pdf', ['data' => $data]);
        // return $pdf->stream();

        return $pdf->download(date('Ymd-hiA', strtotime($date->created_at)) . '.pdf');
    }
}
