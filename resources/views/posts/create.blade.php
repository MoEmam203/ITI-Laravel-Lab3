@extends('./layouts.app')

    @section('pageName') Create Post @endsection

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

        <form action="{{ route ('posts.store') }}" method="post" class="mt-5">
            @csrf
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title">

            <label for="description">Description</label>
            <textarea  class="form-control" name="description" cols="30" rows="4"></textarea>

            <label for="postedby">Post Creator</label>
            <select  class="form-control" name="user_id" id="postedby">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <input type="submit" class="btn btn-success mt-3" value="Create">
        </form>


        @endsection
        
    </div>