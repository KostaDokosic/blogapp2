<div class=" mt-5">
    <form action="{{ url('createcomment') }}" method="POST">
        @csrf
        <h4>Post your comment</h4>
        <div class="mb-3">
            <textarea class="form-control" type="text" name="content" placeholder="Enter your comment" required></textarea>
            <input type="hidden" value="{{ $post->id }}" name="post_id">
        </div>
        <button type="submit" class="btn btn-primary">Create Comment</button>
    </form>

    @include('components.errors')
    @include('components.status')
</div>
