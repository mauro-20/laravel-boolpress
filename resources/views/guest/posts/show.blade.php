@extends('layouts.guest')

@section('pageContent')
  <h2 class="blog-post-title">{{$post['title']}}</h2>
  <p>{{$post['content']}}</p>
  <p class="blog-post-meta">{{$post->updated_at->diffForHumans()}} by <a href="#">Chris</a></p>
@endsection