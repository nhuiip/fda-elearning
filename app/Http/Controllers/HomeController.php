<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Lesson;
use Auth;
// use Dompdf\Dompdf;
// use Barryvdh\DomPDF\PDF;
use PDF;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('home', [
            'title' => 'Home',
            'lessons' => Lesson::where('status', true)->get()
        ]);
    }
    public function pdf()
    {
        $date = Exam::where(['memberId' =>  Auth::user()->id, 'isPass' => true])->orderBy('created_at')->first();
        $data = array('name' => Auth::user()->name, 'date' => $date->created_at);
        $pdf = Pdf::loadView('pdf', ['data' => $data]);
        // return $pdf->stream();

        return $pdf->download(date('Ymd-hiA', strtotime($date->created_at)) . '.pdf');
    }
}
