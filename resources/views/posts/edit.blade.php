@extends('./layouts.app')

    @section('pageName') Edit Post @endsection

    <div class="container">
        @section('content')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route ('posts.update' , $post->id) }}" method="post" class="mt-5">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{ $post->title }}" name="title">

            <label for="description">Description</label>
            <textarea  class="form-control" name="description" cols="30" rows="4">{{ $post->description }}</textarea>

            <label for="user_id">Post Creator</label>
            <select  class="form-control" name="user_id" id="user_id">
                {{-- <option value="{{ $post->user->id }}" selected>{{ $post->user->name }}</option> --}}
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $post->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>

            <input type="submit" class="btn btn-success mt-3" value="Save Updates">
        </form>


        @endsection
    </div>