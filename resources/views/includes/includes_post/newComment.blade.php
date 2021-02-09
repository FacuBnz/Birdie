<div class="col text-center">
    <button type="button" class="border-0 bg-white" data-toggle="modal" data-target="#ModalComment{{ $post->id }}">
        @if(count($post->comments) != 0)
            {{ count($post->comments) }}
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3399FF" class="bi bi-chat-fill" viewBox="0 0 16 16">
                <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#eee" class="bi bi-chat-fill" viewBox="0 0 16 16">
                <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
            </svg>
        @endif
    </button>

    <div class="modal fade" id="ModalComment{{ $post->id }}" tabindex="-1" aria-labelledby="tittleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tittleModal">Comments {{ count($post->comments) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if(count($post->comments) != 0)
                    <div class="modal-body">
                        @foreach($post->comments as $comment)
                            <div class="card">
                                <div class="card-header">
                                    @if($comment->user->image)
                                        <img src="{{ route('user.avatar',['filename' => $comment->user->image]) }}" alt="Avatar de {{ $comment->user->name }}" class="avatar-login img-thumbnail rounded-circle">
                                    @endif
                                    {{ $comment->user->name }} {{ $comment->user->surname }} <span class="text-muted">{{ \App\Helpers\FormatTime::LongTimeFilter($comment->created_at) }}</span>
                                </div>
                                <div class="card-body text-dark">
                                    <p class="card-text">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="modal-footer">
                    <form action="{{route('comment.save')}}" method="post" class="input-group mb-3">
                        @csrf
                        <input type="text" id="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="Write here..." aria-label="Recipient's username" name="comment" aria-describedby="button-addon2">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        @error('comment')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
