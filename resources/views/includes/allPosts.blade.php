@foreach ($posts as $post)

    <div class="card border-light mb-5 shadow-sm bg-white rounded">
        <div class="card-header">
            @if($post->user->image)
                <img src="{{ route('user.avatar',['filename' => $post->user->image]) }}" alt="Avatar de {{ $post->user->name }}" class="avatar-login img-thumbnail rounded-circle">
            @endif

                <a href="{{ route('profile', ['user_id'=>$post->user->id]) }}" class="text-decoration-none"><strong>{{ $post->user->name }} {{ $post->user->surname }}</strong></a> <span class="text-muted">{{ \App\Helpers\FormatTime::LongTimeFilter($post->created_at) }}</span>
            @if($post->user->id == Auth::user()->id)
                <a href="{{ route('post.delete', ['post_id'=> $post->id]) }}" class="close">
                    <span aria-hidden="true">&times;</span>
                </a>
            @endif
        </div>

        <div class="card-body text-dark">
            <p class="card-text">{{ $post->content }}</p>
        </div>

        <div class="card-footer bg-transparent">
            <div class="row">
                @include('includes.includes_post.newComment')
                @include('includes.includes_post.newLike')
            </div>

        </div>
    </div>
@endforeach
