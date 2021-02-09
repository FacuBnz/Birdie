@foreach ($posts as $post)

    <div class="card border-light mb-3 shadow-sm bg-white rounded">
        <div class="card-header">
            @if($post->user->image)
                <img src="{{ route('user.avatar',['filename' => $post->user->image]) }}" alt="Avatar de {{ $post->user->name }}" class="avatar-login img-thumbnail rounded-circle">
            @endif
            {{ $post->user->name }} {{ $post->user->surname }} <span class="text-muted">{{ \App\Helpers\FormatTime::LongTimeFilter($post->created_at) }}</span>
        </div>

        <div class="card-body text-dark">
            <a href="" class="text-decoration-none text-dark"><p class="card-text">{{ $post->content }}</p></a>
        </div>

        <div class="card-footer bg-transparent">
            <div class="row">
                @include('includes.includes_post.newComment')
                @include('includes.includes_post.newLike')
            </div>

        </div>
    </div>
@endforeach
