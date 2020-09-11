<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Storage;

class GalleryController extends Controller
{
    public function index(){
        $user = (new ProfileController)->index()->user;
        $file = Storage::allFiles('public/upload/avatars/' . $user->id);
        return view('gallery', compact('user', 'profile', 'file'));
    }
    public function addGallery(Request $request){
        $user = Auth::user();
        $id = Auth::user()->id;
        $galleryname = $request->input('galleryname');
        $gallery = Storage::disk('avatars')->put($id, $galleryname);
        Storage::makeDirectory($gallery);
        return redirect()->back()->with('success', 'Галерея добавлена');
    }
}
