<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Session;
use App\User;
use Illuminate\Http\Request;

/**
 *
 */
class LoginController extends Controller
{

  public function form()
  {
    if (Session::get('user_id') != '') {
      return redirect('/home');
    } else {
      return view('login');
    }
  }

  public function attempt(Request $request)
  {
    $username = $request->username;
    $password = $request->password;

    if ($username && $password) {
      $cek = User::where('username', $username)
                 ->first();

      if (!$cek) {
        return redirect()->back()->with('messageError', 'Username atau Password Salah');
      }

      if (!Hash::check($password, $cek->password)) {
        return redirect()->back()->with('messageError', 'Username atau Password Salah');
      } else {
        $user = User::find($cek->id);
        Session::put('user_id', $cek->id);
        Session::put('name', $user->profile->name);
        return redirect('/home');
      }
    }
  }

  public function logout()
  {
    Session::flush();
    return redirect('/');
  }
}


?>
