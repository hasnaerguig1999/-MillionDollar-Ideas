@extends('layouts.app')


@section('content')
@if(session()->has('message'))
<div class="alert alert-success" role="alert">
  <center>
  {{session()->get('message')}}
  </center>
</div>
@endif
  <body>

<br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$post->title}}</h3>
              <div>
                <h6 class="fw-bold text-primary mb-1">By : {{$post->user->name}}</h6>
                <h6 class="text-dark mb-1">On : {{date('d-m-Y',strtotime($post->updated_at))}}</h6>
               
              </div>
            </div>
              <div class="card-body">
                
                <div class="im">
                  <center>
                  <img src="/images/{{$post->image_path}}" class="img-fluid" alt="Responsive image" width="50%">
                 </center> 
                </div>
                <div  class="mt-3 mb-4 pb-2">
                {{$post->description}}
                </div>
                @if(Auth::user() && Auth::user()->id == $post->user_id)
                <a href="/blog/{{$post->id}}/edit" class="btn btn-warning">modifie le Post</a>
             <form action="/blog/{{$post->slug}}" method="POST" class="">
              
                @csrf
                @method('DELETE')

               <br> <button type="submit" class="btn btn-danger"> supprimer post </button>
            </form>
                @endif
               </div>

               <div class="container">
               <div class="small d-flex justify-content-start">
               
                </a>
                <a href="#!" class="d-flex align-items-center me-3 text-decoration-none">({{ $post->commentCount() }})
                  <i class="far fa-comment-dots me-2 text-dark"></i>
                 
                </a>
               
              </div>
            </div>
            

               <section style="background-color: #f3f4f5;">
                <div class="container my-5 py-5 text-dark">
                  
                  <div class="row d-flex justify-content-center">
                    @foreach ($post->comments as $comment)
                    <div class="col-md-11 col-lg-9 col-xl-7">
                     
                      <div class="d-flex flex-start mb-4">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="65"
                          height="65" />
                        <div class="card w-100">
                          <div class="card-body p-4">
                            <div class="">
                            

                              <h5>{{$comment->user->name}}</h5>
                            
                              
                              <p class="small">{{date('d-m-Y',strtotime($post->updated_at))}}</p>
                              <p>
                               
                                {{ $comment->body }}
                                
                                
                      
                                </div>
                                
                               
                               <div>
                                
                                  
                               </div>


                             
                            @if(!$comment->likes()->where('user_id', Auth::id())->exists())

                              <form action="/likes" method="POST" style="display: inline;">
                                @csrf
                                
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                                
                                
                                    <button type="submit" class="btn btn-light" >Like <i class="fa-solid fa-heart text-danger"></i></button>
                                
                            </form>
                            @else
                                

                              <form action="/likes/{{ $comment->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                                
                                
                                    <button type="submit" class="btn btn-light" >UnLike <i class="fas fa-thumbs-down text-primary"></i></button>
                                
                            </form>
                            @endif
                                

                                
                              <span>{{ $comment->likes()->count() }} likes</span>
                               
                              </p>
              

                            </div>
                          </div>
                        </div>
                      </div>
              
                      @endforeach
                    </div>
                    
                  </div>
                </div>
                {{-- @endforeach --}}
              </section>
             
             </div>
             
             
          

             
          </div>
       </div>

    </div>

    
@endsection

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 