<div class="col text-center">
    <?php $link = false ?>
    @foreach($post->likes as $like)
        @if($like->user->id == Auth::user()->id)
            <?php $link = true ?>
        @endif
    @endforeach

    <a href="{{ $link ? route('dislike',['post_id'=>$post->id]) : route('like',['post_id'=>$post->id]) }}" data-toggle="tooltip" title="like">
        <span class="text-decoration-none text-muted">{{ count($post->likes) }}</span>
        <?php $l = false ?>
        @foreach($post->likes as $like)
            @if($like->user->id == Auth::user()->id)
                <?php $l = true ?>
            @endif
        @endforeach
        @if($l)
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#CC0000" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#eee" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
            </svg>
        @endif
    </a>
</div>
