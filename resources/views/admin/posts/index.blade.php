@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                  
                <div class="card-body">
                  @if ($message = Session::get('error'))
                  <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>    
                      <strong>{{ $message }}</strong>
                  </div>
                  @endif
                  @if ($notification = Session::get('success'))
                  <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                          <strong>{{ $notification }}</strong>
                  </div>
                  @endif
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categoty</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)
                      <tr>
                        <th scope="row">{{$post['id']}}</th>
                        <td>{{$post['title']}}</td>
                        <td>{{$post['slug']}}</td>
                        <td>{{$post['category']['name'] ?? ""}}</td>
                        <td>
                          <a href="{{route('admin.posts.show', $post['id'])}}"><button type="button" class="btn btn-primary">Show</button></a>
                          <a href="{{route('admin.posts.edit', $post['id'])}}"><button type="button" class="btn btn-warning">Edit</button></a>
                          <button type="button" class="btn btn-danger btn-delete" data-id="{{$post["id"]}}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                        </td>
                      </tr>  
                      @endforeach
                    
                      
                    </tbody>
                  </table> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('admin.posts.destroy', 'id')}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" id="delete-id" name="id">
        <div class="modal-body">
          Do You really want to delete the post?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection