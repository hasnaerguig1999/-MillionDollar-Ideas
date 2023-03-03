<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;


class CommentsController extends Controller
{

   public function index()
    {
      
        
    }
  public function store(Request $request)
  {
 
    Comment::create([
     'body' => $request->input('body'),
     'post_id' => $request->input('post_id'),
        'user_id' => auth()->user()->id,





    ]);

    return redirect("/blog/".$request->input('post_id'));
  }

   public function like(Request $request)
{
    $comment = Comment::findOrFail($request->id);
    $user = auth()->user();
    // Si l'utilisateur a déjà aimé le commentaire, supprimer l'entrée de la base de données
    if ($user->likes()->where('comment_id', $comment->id)->count() > 0) {
        $user->likes()->where('comment_id', $comment->id)->delete();
    } else { // Sinon, ajouter une nouvelle entrée dans la base de données
        $like = new Like();
        $like->user_id = $user->id;
        $like->comment_id = $comment->id;
        $like->save();
    }

    return redirect()->back();
}

 
}