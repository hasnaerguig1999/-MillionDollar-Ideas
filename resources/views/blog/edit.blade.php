@extends('layouts.app')


@section('content')
<center>
<div class="">
  <h1 class="btn btn-info">Edit post</h1> <br>
  <div>
    
  </center>
  <body>
<br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Publication d'un projet</h3>
            </div>
    <div class="card-body">
      <form  action="/blog/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="description" >Description</label>
          <textarea class="form-control" id="description" name="description" >{{$post->description}}</textarea>
         
        </div>
     
        
       <div class="form-group">
          <label for="categorie" >Catégorie</label>
          <select class="form-control" id="categorie" name="title" value="{{$post->title}}">
            <option value="">Sélectionner une catégorie</option>
            <option value="Technologie" @selected($post->title == 'Technologie')>Technologie</option>
            <option value="Art" @selected($post->title == 'Art')>Art</option>
            <option value="Musique" @selected($post->title == 'Musique')>Musique</option>
            <option value="Design" @selected($post->title == 'Design')>Design</option>
          </select>
        </div> 
        <br>
        <div class="form-group">
          <input type="file" class="form-control-file" id="images" name="image" value="{{$post->image_path}}">
        </div> <br>
        <button type="submit" class="btn btn-primary">Publier</button>
      </form>
    </div>
  </div>
</div>
</div>
</div>

@endsection