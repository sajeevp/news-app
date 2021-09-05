<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Request $request)
    {
        $news = $request->user()->news()->with(['user', 'likes'])->orderBy('created_at', 'desc')->cursorPaginate(5);
        return view('dashbord', ['news' => $news]);
    }
    public function userPicture(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $name = $request->user()->username . '-' . time() . '.' . $request->file->extension();
        $image = Image::make($request->file)->fit(200)->save(public_path('userPicture') . '/' . $name);

        $request->user()->profile_pic = $name;
        $request->user()->save();

        return back()->with('success', 'You have successfully upload image.');
    }
}
