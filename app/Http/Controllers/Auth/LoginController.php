<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    public function username()
    {
        return 'email';
    }

    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password];
    }

    // protected function validateLogin(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'email' => ['required', 'exists:members,email'],
    //             'password' => 'required|exists:members,rawPassword',
    //         ],
    //         [
    //             'email.required' => 'ข้อมูลไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง!',
    //             'email.required' => 'ไม่พบบัญชีผู้ใช้ กรุณาตรวจสอบอีกครั้ง!',
    //             'password.required' => 'ข้อมูลไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง!',
    //             'password.exists' => 'รหัสผ่านไม่ถูก กรุณาตรวจสอบอีกครั้ง!',
    //         ]
    //     );
    // }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required','exists:members,email'],
            'password' => 'required',
        ],
        [
            $this->username().'.required' => 'ข้อมูลไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง!',
            $this->username().'.numeric' => 'กรุณากรอกเลขประจำตัวประชาชน!',
            $this->username().'.exists' => 'ไม่พบบัญชีผู้ใช้ กรุณาตรวจสอบอีกครั้ง!',
            'password.required' => 'ข้อมูลไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง!',
        ]);
    }

    protected function authenticated()
    {
        $data = Member::findOrFail(Auth::user()->id);
        if ($data->firstLoginDate == null) {
            $data->firstLoginDate = now();
        }
        $data->lastVisitDate = now();
        $data->save();
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
