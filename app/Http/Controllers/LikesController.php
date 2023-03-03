<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;


class LikesController extends Controller
{
    
    public function store(Request $request)
    {
        
       
        
        like::create([
            'comment_id' => $request->input('comment_id'),
             'user_id' => auth()->user()->id,

        ]);
        return Redirect::back();
    }  

    // public function like(Comment $comment)
    // {
    // $like = Like::where('user_id', auth()->user()->id)->where('comment_id', $comment->id)->first();
    
    //     if (!$like) {
    //         $like = new Like();
    //         // $like->user_id = Auth::id();
    //         $like->user_id = auth()->user()->id;
    //         $like->comment_id = $comment->id;
    //         $like->save();
    //     } else {
    //         $like->delete();
    //     }
    
    //     return back();
    // }
    
    public function toggleLike(Request $request, $id)
{
    $comment = Comment::find($id);
    // $liked = $comment->likes()->where('user_id', Auth::id())->exists();
    $liked = $comment->likes()->where('user_id', auth()->user()->id)->exists();

    if ($liked) {
        // $comment->likes()->where('user_id', Auth::id())->delete();
        $comment->likes()->where('user_id', auth()->user()->id)->delete();  
        return redirect()->back()->with('success', 'Le like a été retiré.');
    } else {
        // $comment->likes()->create(['user_id' => Auth::id()]);
        $comment->likes()->create(['user_id' => auth()->user()->id]);
        return redirect()->back()->with('success', 'Le commentaire a été aimé.');
    }
    
}
      // $like = Like::where('user_id', Auth::id())->where
        // ('comment_id', $comment->id)->first();
       
        //    $like = Like::where('user_id', auth()->user()->id)->where('comment_id', $comment->id)->first();
        //    $like->delete();
    
    // return redirect("/blog/".$request->input('comment_id'));

    // $user = Auth::user();
    // $user = auth()->user();

    // $like = Like::where('user_id', $user->id)
    //     ->where('comment_id', $request->comment_id)
    //     ->first();

    // if ($like) {
    //     $like->delete();
    //     $liked = false;
    // } else {
    //     $like = new Like();
    //     $like->user_id = $user->id;
    //     $like->comment_id = $request->comment_id;
    //     $like->save();
    //     $liked = true;
    // }

    // return response()->json(['liked' => $liked]);




     public function index()
    {
        // return view('blog.index');
        // return redirect("/blog/".$request->input('comment_id'));
        // return view('blog.index')->with('comments',Comment::get());
        // $like = Like::get();
        // return view('blog.index') 
        // ->with('like',$like);

        // $comment = Comment::find(1);
        // return view('comments.show', ['comment' => $comment]);
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   

    /**
     * Display the specified resource.
     */
    // public function show($id){
    //     $comment = Comment::find($id);
    //     $likes=$comment->sum('like');
    //     return view('blog.show', compact('comment', 'likes'));
    // }
    public function show($id)
{
    $comment = Comment::find($id);
    $likes = $comment->likes->sum('like');

    return view('comments.show', compact('comment', 'likes' ));
    // return redirect("/blog/".$request->input('post_id'));

}
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Like::where('comment_id', $id)->delete();
        return redirect()->back();
    }
}
