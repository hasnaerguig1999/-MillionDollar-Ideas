@extends('layouts.app')

@section('content')

@foreach
<div>
  <h2>{{$post->title}}</h2>
</div>
<div>
  <p>{{$post->description}}</p>
</div>
<div>
  <img src="/images/{{$post->image_path}}" alt="">
</div>
@endforeach

@endsection