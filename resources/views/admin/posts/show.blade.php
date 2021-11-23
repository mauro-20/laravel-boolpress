@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h1>{{$post['title']}}</h1>
                    <p>{{$post['content']}}</p>
                    <p>Category: {{$post['category']['name']}}</p>
                    <p>Created: {{$post['created_at']}}</p>
                    <p>Updated: {{$post['updated_at']}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection