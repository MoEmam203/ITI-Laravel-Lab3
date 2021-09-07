@extends('./layouts.app')

    @section('pageName') All Posts @endsection

    <div class="container">
        @section('content')

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="text-center m-3">
                <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
            </div>

            @if (count($postsCollection) == 0)
                    No Posts Yet
            @else

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col" class="text-danger">Pagination</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">PostedBy</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($postsCollection as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug ?? 'Not Found' }}</td>
                            <td>{{ $post->user->name }}</td>
                            {{-- <td>{{  $post->created_at }}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</td>

                            <td>
                                <a href="{{ route('posts.show' , $post->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('posts.destroy' , $post->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"  value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="d-flex justify-content-center mb-5">
                {!! $postsCollection->links() !!}
            </div>

            @endif

        @endsection
    </div>