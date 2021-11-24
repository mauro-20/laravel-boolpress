@extends('layouts.guest')

@section('pageContent')
  <h2 class="blog-post-title">{{$tag['name']}}</h2>
  @if (count($tag['posts']) > 0)
    <h5>Related posts:</h5>
    <ul>
    @foreach ($tag['posts'] as $post)
      <li><a href="{{route('post.show', $post['slug'])}}">{{$post['title']}}</a></li>
    @endforeach  
    </ul>
  @endif
@endsection