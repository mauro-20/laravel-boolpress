@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit category {{$category['name']}}</div>
                <div class="card-body">
                  @if ($message = Session::get('error'))
                  <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>    
                      <strong>{{ $message }}</strong>
                  </div>
                  @endif
                  
                   <form action="{{route('admin.categories.update', $category['id'])}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group" >
                      <label for="name">name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Insert name" value="{{old('name') ?? $category['name']}}">
                      @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection