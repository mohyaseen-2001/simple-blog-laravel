@extends('layouts.app')

@section('title') Create @endsection

@section('content')

  

    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label  class="form-label">Post Creator</label>
<select name="user_id" class="form-control" required>
    <option value="">Select Creator...</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>

        </div>

        <button class="btn btn-success">Submit</button>
    </form>


@endsection