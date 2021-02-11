@foreach ($all_posts as $post)
    @foreach($post->likes as $like)
        @if($like->user_id == $user->id)
            <div class="card border-light mb-5 shadow-sm bg-white rounded">
                <div class="card-header">
                    @if($post->user->image)
                        <img src="{{ route('user.avatar',['filename' => $post->user->image]) }}" alt="Avatar de {{ $post->user->name }}" class="avatar-login img-thumbnail rounded-circle">
                    @endif
                    <strong>{{ $post->user->name }} {{ $post->user->surname }}</strong> <span class="text-muted">{{ \App\Helpers\FormatTime::LongTimeFilter($post->created_at) }}</span>
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
        @endif
    @endforeach
@endforeach
