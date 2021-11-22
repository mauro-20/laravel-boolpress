@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Write new post') }}</div>
                <div class="card-body">
                  @if ($message = Session::get('error'))
                  <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>    
                      <strong>{{ $message }}</strong>
                  </div>
                  @endif
                  
                  <form action="{{route('admin.posts.store')}}" method="POST">
                    @csrf
                    
                    <div class="form-group" >
                      <label for="title">Title</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Insert Title">
                      @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="content">Content</label>
                      <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content" placeholder="Insert Post Content..."></textarea>
                       @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="category_id">Category</label>
                      <select class="form-control" name="category_id" id="category_id">
                        <option value="" selected disabled>--Select a category--</option>
                        @foreach ($categories as $category)
                        <option value="{{$category['id']}}">{{ $category['name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection