@extends('layouts.app')

@section('content')
@if(session()->has('message'))
<div class="alert alert-danger" role="alert">
  <center>
  {{session()->get('message')}}
  </center>
</div>
@endif
<center>
  <div>
  <h1>All Posts</h1>
</div>
</center>

  @if(Auth::check())
  <center>
<div class="">
  <a href="/blog/create" class="btn btn-info">add new post</a>
</div>
    
  </center>
  @endif
@foreach ($posts as $post)

<section style="background-color: #eee;">
  <div class="container my-5 py-5">
  
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-start align-items-center">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                height="60" />
             
              <div>
                <h6 class="fw-bold text-primary mb-1">By : {{$post->user->name}}</h6>
                <h6 class="text-dark mb-1">On : {{date('d-m-Y',strtotime($post->updated_at))}}</h6>
                <p class="text-muted small mb-0">
                  Category :
                 {{$post->title}}
                </p>
              </div>
            </div>

            <p class="mt-3 mb-4 pb-2">
             {{$post->description}}
            </p>
            <center>
              <div class="im">
                <img src="/images/{{$post->image_path}}" class="img-fluid" alt="Responsive image"  >
              </div><br> </center>
              
            <div class="small d-flex justify-content-start">
              
              </a>
              <a href="#!" class="d-flex align-items-center me-3 text-decoration-none">({{ $post->commentCount() }})
                <i class="far fa-comment-dots me-2 text-dark"></i>
               
              </a>
            </div>
            
          </div>

       
          <form  method="POST" action="/comments">
            @csrf
           
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                height="40" />
              <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;" name="body"></textarea>
                  <input type="hidden" name="post_id" value="{{$post->id}}">
                <label class="form-label" for="textAreaExample">Commentaire</label>
              </div>
            </div>
            <div class="float-end mt-2 pt-1">
              <a href="/blog/{{$post->id}}" class="btn btn-dark btn-sm">Read more</a>

              <button type="submit" class="btn btn-success btn-sm">Post comment</button>
              <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>

    
@endforeach

@endsection
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 