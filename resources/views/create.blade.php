@extends('layouts.app')

@section('title') Create @endsection

@section('content')

<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- Create Post Form -->

  

    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="{{ old('title') }}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3" value="{{ old('description') }}"></textarea>
        </div>

        <div class="mb-3">
            <label  class="form-label">Post Creator</label>
<select name="user_id" class="form-control" >
    <option value="">Select Creator...</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>

        </div>

        <button class="btn btn-success">Submit</button>
    </form>


@endsection