@extends('layouts.guest')

@section('pageContent')
  <h2 class="blog-post-title">{{$category['name']}}</h2>
  @if (count($category['posts']) > 0)
    <h5>Related posts:</h5>
    <ul>
    @foreach ($category['posts'] as $post)
      <li><a href="{{route('post.show', $post['slug'])}}">{{$post['title']}}</a></li>
    @endforeach  
    </ul>
  @endif
@endsection