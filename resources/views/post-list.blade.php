<x-list-layout>
    <x-slot:title>
        Community
    </x-slot:title>
{{--    <x-slot:route>--}}
{{--        {{ route('post.store') }}--}}
{{--    </x-slot:route>--}}
    <!-- Button trigger modal -->
    @if(Auth::check())
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create Post
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <x-input>
                                <x-slot:label>
                                    Title
                                </x-slot:label>
                                <x-slot:name>
                                    title
                                </x-slot:name>
                            </x-input>
                            <textarea class="form-floating" name="content"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Post</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>
                    {{--                    <x-post>--}}
                    {{--                        <x-slot:title>--}}
                    {{--                            {{ $post->title }}--}}
                    {{--                        </x-slot:title>--}}
                    {{--                        <x-slot:content>--}}
                    {{--                            {{ $post->content }}--}}
                    {{--                        </x-slot:content>--}}
                    {{--                        <x-slot:relative_date>--}}
                    {{--                            {{ now() }}--}}
                    {{--                        </x-slot:relative_date>--}}
                    {{--                    </x-post>--}}
                    <div class="card w-100">
                        <div class="row">
                            <div class="card w-25 h-25 col-md-2">
                                @isset($post->user->image)
                                    <img src="{{ asset('images/'.$post->user->image) }}" class="card-img-top">
                                @endisset
                                <div class="card-body">
                                    <h5 class="card-title">Author</h5>
                                    <p class="card-text">{{ $post->user->name }}</p>
                                </div>
                            </div>
                            <div class="card col-md-2 w-50">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->content }}</p>
                                </div>
                            </div>
                            <div class="card col-md-2">
                                <div class="align-self-center">
                                    <div role="button" data-bs-toggle="collapse" role="button"
                                         data-bs-target="#collapse-{{ $post->id }}">
                                        <h1 style="font-size:5vw"><i
                                                class="bi bi-chat-square-fill "></i>{{ $post->comments->count() }}</h1>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><small class="text-muted"><i
                                                    class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                            </small></p>
                                        @if(Auth::Check())
                                            @if(Auth::id() == $post->user_id || Auth::User()->role == 'admin')
                                                <form action="{{route('post.delete', $post->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                    {{--                                <div role="button" data-bs-toggle="collapse" role="button" data-bs-target="#collapse-{{ $post->id }}">--}}
                                    {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-chat-square-fill" viewBox="0 0 16 16">--}}
                                    {{--                                    <path d="M2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>--}}
                                    {{--                                    <text x="0" y="15" style="fill:red;">{{ $post->comments->count() }}</text>--}}
                                    {{--                                </svg>--}}
                                </div>
                            </div>
                            <div class="collapse h-20" id="collapse-{{ $post->id }}">
                                @if(Auth::check())
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#CreateCommentModal-{{ $post->id }}">
                                        Create Comment
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="CreateCommentModal-{{ $post->id }}" tabindex="-1"
                                         aria-labelledby="CreateCommentModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="CreateCommentModal">Create Comment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('comment.store', ['post_id' => $post->id]) }}"
                                                      method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label>
                                                            Comment:
                                                            <textarea class="form-floating" name="content"></textarea>
                                                        </label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Submit comment
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach($post->comments as $comment)
                                    <div class="row">
                                        {{--                                    <div class="card w-100 h-20">--}}
                                        <div class="card w-5 h-5 col">
                                            @isset($comment->user->image)
                                                <img src="{{ asset('images/'.$comment->user->image) }}"
                                                     class="img-thumbnail card-img-top">
                                            @endisset
                                            <div class="card-body">
                                                <h5 class="card-title">Author</h5>
                                                <p class="card-text">{{ $comment->user->name }}</p>
                                                <p class="card-text"><small class="text-muted"><i
                                                            class="bi bi-clock"></i> {{ $comment->created_at->diffForHumans() }}
                                                    </small></p>
                                                @if(Auth::Check())
                                                    @if(Auth::id() == $comment->user_id || Auth::User()->role == 'admin')
                                                        <form action="{{route('comment.delete', $comment->id)}}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card card-body w-75 h-10">
                                            {{ $comment->content }}
                                        </div>
                                        {{--                                </div>--}}
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</x-list-layout>
