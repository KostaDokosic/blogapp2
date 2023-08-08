<div class="container mt-5">
    @foreach ($post->comments as $comment)
        <div class="p-5 text-center text-muted bg-body border border-dashed rounded-5 mb-4">
            <small class="col-lg-6 mx-auto mb-4">{{ $comment->user->name }}</small>



            @if (auth()->user() && auth()->user()->id == $comment->user->id)
                <form action="{{ url('updatecomment') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <div class="row">
                        <div class="col">
                            <input class="col-lg-6 mx-auto mb-4" value="{{ $comment->content }}" name="content" />
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <form action="{{ url('deletecomment') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <button type="submit" class="btn btn-warning">Delete</button>
                </form>
            @else
                <p class="col-lg-6 mx-auto mb-4">{{ $comment->content }}</p>
            @endif
        </div>
    @endforeach
    {{ $post->comments }}
</div>
