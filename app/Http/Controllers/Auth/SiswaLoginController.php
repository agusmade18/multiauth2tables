<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;
use App\Siswa;

class SiswaLoginController extends Controller
{
    //

	public function __construct()
  {
    $this->middleware('guest:siswa', ['except' => ['logout']]);
  }
  
  public function showLoginForm()
  {
    return view('auth.siswa_login');
  }
  
  public function login(Request $request)
  {
    // Validate the form data
    $this->validate($request, [
      'nik'   => 'required|min:3',
      'nipd' => 'required|min:3'
    ]);
    // Attempt to log the user in
    // $credentials = $request->only('nik', 'nipd');
    $cek = Siswa::where('nik', $request->nik)->where('nipd', $request->nipd)->first();
    if($cek)
    {
      if (Auth::guard('siswa')->loginUsingId($cek->id)) {
        return redirect()->intended('/siswa');
      }
    }
    // if unsuccessful, then redirect back to the login with the form data
    return redirect('/siswa/login');
  }
  
  public function logout()
  {
      Auth::guard('siswa')->logout();
      return redirect('/siswa');
  }
}
