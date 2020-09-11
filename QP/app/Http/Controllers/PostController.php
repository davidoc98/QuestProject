<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Post;

class PostController extends Controller
{
  public function store(Request $request) {
    //$id = Auth::id();
    $validator = Validator::make($request->post(), [
        'content' => 'required|string',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();;
    }
    Auth::user()->posts()->create($validator->getData());
    return redirect()->back()->with('success', 'Пост отправлен на страницу.');
    //$posts = Post::create($validator->getData()); // сделал чтоб понимал валидацию и понимал что могут ошибки быть и чтоб меньше глупых вопросов.. достаточно просто dd()
    return redirect('/');
  }
  public function show(Request $request)
  {
  }
  public function destroy($id)
  {
      $post = Post::find($id); // id поста, который удаляем
      $post_user_id = $post->user_id; // id автора, удаляемого поста
      $user_id = Auth::user()->id; // авторизованный пользователь
      //dd($post_user_id, $user_id);
      if ($post_user_id == $user_id){
        //echo ($post_user_id . "=" . $user_id);
        $post->delete(); // удаляем пост, если id автора = id авторизованного пользователя
        return redirect()->back()->with('success', 'Пост удален');
      }
      else return redirect()->back()->with('notsuccess', 'Этот пост вам не принадлежит');
  }
}
