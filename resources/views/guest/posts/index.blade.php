@extends('layouts.guest')

@section('pageContent')

  @foreach ($posts as $post)
  <div class="blog-post">
    <h2 class="blog-post-title"><a href="{{route('post.show', $post['slug'])}}">{{$post['title']}}</a></h2>
    <p class="blog-post-meta">{{$post->updated_at->diffForHumans()}} by <a href="#">Chris</a></p>
    @if ($post['tags'])
      <p>
        @foreach ($post['tags'] as $tag)
          <a href="{{route('tag.show', $tag['slug'])}}"><span class="badge badge-pill badge-primary">{{$tag['name']}}</span></a>
        @endforeach
      </p>
    @endif
    @if ($post['category'])
      <h5>Category: <a href="{{route('category.show', $post->category['slug'])}}">{{$post['category']['name']}}</a></h5>  
    @endif
    <p>{{$post['content']}}</p>
  </div><!-- /.blog-post -->
  @endforeach

  <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled">Newer</a>
  </nav>

@endsection