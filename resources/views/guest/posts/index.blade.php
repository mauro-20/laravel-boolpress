@extends('layouts.guest')

@section('pageContent')

  @foreach ($posts as $post)
  <div class="blog-post">
    <h2 class="blog-post-title"><a href="{{route('post.show', $post['slug'])}}">{{$post['title']}}</a></h2>
    <p class="blog-post-meta">{{$post->updated_at->diffForHumans()}} by <a href="#">Chris</a></p>
    <p>{{$post['content']}}</p>
  </div><!-- /.blog-post -->
  @endforeach

  <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled">Newer</a>
  </nav>

@endsection