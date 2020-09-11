<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Post;
use Storage;
use App\Models\Image;

class ProfileController extends Controller
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
       return view('profile', compact('user', 'profile'));
         //return view('user.profile')->with('user', 'posts' , User::findOrFail(Auth::id()));
     }


     //показываем страницу другого пользователя Route::get('user/{id}', 'UserController@show')->name('profile')
    public function show(Request $request, $user_alias) {
      //$user = User::findOrFail($id);
      if(is_numeric($user_alias)) {
          $user = User::find($user_alias);
      } else {
          $user = User::where('linkname', '=', $user_alias)->first();
      }
      if(!$user) abort(404);
      $profile = (Auth::id() == $user->id) ? true : false;
      //$posts = Post::all()->sortByDesc('created_at');
      //$posts = Post::whereIn('user_id', '=', );
      $posts = Post::all()->whereIn('user_id', $user->id)->sortByDesc('created_at');
      //$posts = $user->posts($user_id);
      return view('profile', compact('user', 'profile', 'posts'));
    }

    //Редактируем профиль Route::get('/editprofile', 'Users\ProfileController@edit')->name('profile.edit');
    public function settings(){
      return view('profileSettings')->with('user' , User::findOrFail(Auth::id()));
    }


    //Редактируем профиль (Сохраняем) Route::put('/updateprofile', 'Users\ProfileController@update')->name('profile.update');
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->firstname = $request->input('firstname');
        $user->surname = $request->input('surname');
        $user->linkname = $request->input('linkname');
        $validateData = $request->validate([
            'firstname' => 'required|min:2',
            'surname' => 'required|min:2',
            'linkname' => 'required|min:2',
        ]);
        $user->save();

         return redirect()->back()->with('success', 'Данные пользователя обновлены.');
     }


    // Обновление аватара
     public function UpdateAvatar(Request $request){
         // Logic for user upload of avatar
         if($request->hasFile('avatar')){
             $avatar = $request->file('avatar');
             //$filename = time() . '.' . $avatar->getClientOriginalExtension();
             //Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename ) );
             $id = Auth::user()->id;
             $filename = Storage::disk('avatars')->put($id, $avatar);
             $user = Auth::user();
             $user->avatar = $filename;
             $user->save();
         }
         return redirect()->back()->with('success', 'Фото профиля обновлено.');
     }
}
