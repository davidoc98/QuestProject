<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;

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

     //показываем страницу пользователя Route::get('user', 'UserController@index')->name('my_profile')
     public function index() {
       $user = Auth::user();
       $profile = true;
       $status = $user->access;
       return view('home', compact('user', 'profile'));
         //return view('user.profile')->with('user', 'posts' , User::findOrFail(Auth::id()));
     }
     //показываем страницу другого пользователя Route::get('user/{id}', 'UserController@show')->name('profile')
    public function show($id) {
      //$user = User::findOrFail($id);
      $user = User::where('linkname', '=', $id)->orWhere('id', '=', $id)->first();
      $profile = (Auth::id() == $user->id) ? true : false;
      return view('home', compact('user', 'profile'));
    }
}
