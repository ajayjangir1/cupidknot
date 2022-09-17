<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
 
class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('authadmin', ['except' => 'logout']);
    }

    public function getLogin(){
        $authUser = auth()->guard('admin')->user();

        if ($authUser) {
            return redirect()->route('adminDashboard');
        }
        return view('admin.auth.login');
    }
 
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
            // if($user->is_admin == 1){
                return redirect()->route('adminDashboard')->with('success','You are Logged in sucessfully.');
            // }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }
 
    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }
}
