@extends('layouts.app')
@section('title') edit @endsection

@section('content')
    <form method="POST" action="{{ route('posts.update',$post->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title </label>
            <input name="title" type="text" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3" required>{{ $post->description }}</textarea>
        </div>

        <div class="mb-3">
            <label  class="form-label">Post Creator</label>
            <select name="user_id" class="form-control" required>
    @foreach($users as $user)
        <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
    @endforeach
</select>

        </div>

        <button class="btn btn-success" >update</button>
    </form>

@endsection