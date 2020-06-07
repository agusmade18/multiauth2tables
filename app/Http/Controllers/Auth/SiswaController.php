<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
	public function __construct()
  {
      $this->middleware('auth:siswa');
  }
  /**
   * show dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('siswa');
  }
}
