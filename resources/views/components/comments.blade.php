<div class="container mt-5">
    @foreach ($post->comments as $comment)
        <div class="p-5 text-center text-muted bg-body border border-dashed rounded-5 mb-4">
            <small class="col-lg-6 mx-auto mb-4">{{ $comment->user->name }}</small>
            <p class="col-lg-6 mx-auto mb-4">{{ $comment->content }}</p>
        </div>
    @endforeach
    {{ $post->comments }}
</div>
