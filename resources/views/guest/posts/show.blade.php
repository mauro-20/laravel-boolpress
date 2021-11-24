@extends('layouts.guest')

@section('pageContent')
  <h2 class="blog-post-title">{{$post['title']}}</h2>
  <p>{{$post['content']}}</p>
  <p>
    @foreach ($post['tags'] as $tag)
        <a href="{{route('tag.show', $tag['slug'])}}"><span class="badge badge-pill badge-primary">{{$tag['name']}}</span></a>
    @endforeach
  </p>
  @if ($post['category'])
    <h5>Category: <a href="{{route('category.show', $post->category['slug'])}}">{{$post['category']['name']}}</a></h5>  
  @endif
  <p class="blog-post-meta">{{$post->updated_at->diffForHumans()}} by <a href="#">Chris</a></p>
@endsection