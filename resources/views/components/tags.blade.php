<ul class="container list-inline">
    @foreach ($post->tags as $tag)
        <li class="alert alert-success"><a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
    @endforeach
</ul>
