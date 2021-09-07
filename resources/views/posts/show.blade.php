@extends('./layouts.app')

    @section('pageName') Post Data @endsection

    <div class="container">
        @section('content')

            <div class="card mt-5">
                <div class="card-header">
                    Post Info
                </div>
                <div class="card-body">
                    <h3>Title :- {{ $postData->title }}</h3>
                    <h3>Description :-</h3>
                    <span class="text-muted">{{ $postData->description }}</span>
                </div>
            </div>

            <div class="card mt-5 mb-3">
                <div class="card-header">
                    Post Creator Info
                </div>
                <div class="card-body">
                    <p>
                        <span class="font-weight-bold">Name :</span>
                        {{ $postData->user->name }}
                    </p>
                    <p>
                        <span class="font-weight-bold">Email :</span>
                        {{ $postData->user->email }}
                    </p>
                    <p>
                        <span class="font-weight-bold">Created At:</span>
                        {{ \Carbon\Carbon::parse($postData->user->created_at)->format('l jS \\of F Y h:i:s A') }}
                    </p>
                </div>
            </div>

            <a href="{{ route('posts.index') }}"> <- Return to all posts</a>
        @endsection
    </div>