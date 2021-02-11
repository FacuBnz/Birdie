@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('includes.newPost')

            <div class="col position-sticky">
                <div class="card">
                    @if(Auth::user()->image)
                        <img src="{{ route('user.avatar',['filename' => $user->image]) }}" class="card-img-top" alt="Avatar of {{ $user->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $user->name }} {{ $user->surname }}</h5>
                        <span>Nickname:</span><p>{{ $user->nickname }}</p>
                        <span>Email:</span><p>{{ $user->email }}</p>
                        @if($user->id == Auth::user()->id)
                            <a href="{{ route('setting') }}" class="btn btn-primary">Editar</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-6">

                @include('includes.message')
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-post" role="tabpanel" aria-labelledby="list-post-list">
                        @include('includes.allPosts')
                    </div>

                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        @include('includes.allLikesProfile')
                    </div>
                </div>

            </div>

            <div class="col position-sticky">
                <div class="list-group " id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-post-list" data-toggle="list" href="#list-post" role="tab" aria-controls="post">Posts</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Likes</a>
                </div>
            </div>

        </div>
    </div>
@endsection
