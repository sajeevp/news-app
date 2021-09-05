<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['user', 'likes'])->orderBy('created_at', 'desc')->cursorPaginate(5);
        return view('home', [
            'news' => $news
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->news()->create($request->only('body'));

        return back();
    }
    public function like(Request $request, News $item)
    {
        if (!$item->likedBy($request->user())) {
            $item->likes()->create([
                'user_id' => $request->user()->id,
            ]);
        } else {
            $item->likes()->where('user_id', $request->user()->id)->delete();
        }

        return back();
    }
    public function delete(News $item)
    {
        $this->authorize('delete', $item);
        $item->delete();
        return back();
    }
}
