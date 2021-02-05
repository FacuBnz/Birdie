@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')
            @include('includes.newPost')

            @foreach ($posts as $post)

                <div class="card border-light mb-3 shadow-sm bg-white rounded">
                    <div class="card-header">
                        @if($post->user->image)
                            <img src="{{ route('user.avatar',['filename' => $post->user->image]) }}" alt="Avatar de {{ $post->user->name }}" class="avatar-login img-thumbnail rounded-circle">
                        @endif
                        {{ $post->user->name }} {{ $post->user->surname }}
                    </div>

                    <div class="card-body text-dark">
                        <p class="card-text">{{ $post->content }}</p>
                    </div>

                    <div class="card-footer bg-transparent">
                        <div class="row">

                            <div class="col text-center">
                                <a href="" data-toggle="tooltip" title="Comment">
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
                                </a>
                            </div>

                            <div class="col text-center">
                                <a href="" data-toggle="tooltip" title="Share">
                                    @if(count($post->likes) != 0)
                                        {{ count($post->likes) }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00CC66" class="bi bi-share-fill" viewBox="0 0 16 16">
                                            <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#eee" class="bi bi-share-fill" viewBox="0 0 16 16">
                                            <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                        </svg>
                                    @endif
                                </a>
                            </div>

                            <div class="col text-center">
                                <a href="" data-toggle="tooltip" title="like">
                                    @if(count($post->likes) != 0)
                                        {{ count($post->likes) }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#CC0000" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                                        </svg>
                                    @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#eee" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                                    </svg>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

            {{ $posts->links() }}
        </div>

    </div>
</div>
@endsection
