<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if($guard == "admin" && Auth::guard('admin')->check())
        // {
        //   return redirect('/admin');
        // } else if($guard == "siswa" && Auth::guard('siswa')->check())
        // {
        //   return redirect('/siswa');
        // } else {
        //   return redirect('/');
        // }
      
      // dd(Auth::guard('admin')->check()." DAN ".Auth::guard('siswa')->check());
      switch ($guard) {
        case 'admin':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('admin.dashboard');
          }

        case 'siswa':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('siswa.dashboard');
          }

        default:
          if (Auth::guard($guard)->check()) {
              return redirect('/');
          }
          break;
      }

      // switch ($guard) {
      //   case Auth::guard($guard)->check():
      //     if ($guard == "admin") {
      //       return redirect()->route('admin.dashboard');
      //     } else if ($guard == "siswa") {
      //       return redirect()->route('siswa.dashboard');
      //     }

      //   default:
      //     if (Auth::guard($guard)->check()) {
      //         return redirect('/');
      //     }
      //     break;
      // }
      return $next($request);
    }
}
