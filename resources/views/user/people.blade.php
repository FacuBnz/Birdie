@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mb-5">
            @include('includes.message')
            @include('includes.newPost')
            <form action="{{route('people')}}" id="buscador">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="search" name="search" aria-label="Recipient's username" aria-describedby="search2">
                    <div class="input-group-append">
                        <input class="btn btn-success" type="submit" id="search2" value="Search">
                    </div>
                </div>
            </form>
        </div>
        <div class="row justify-content-center">
            @foreach($users as $user)
                <div class="card mr-2 text-center shadow" style="width: 18rem;">
                    <img src="{{ route('user.avatar',['filename' => $user->image]) }}" style="max-width: 300px;"  alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name." ".$user->surname }}</h5>
                        <p class="card-text text-muted">{{ "@".$user->nickname }}</p>
                        <a href="{{ route('profile',['user_id'=>$user->id]) }}" class="btn btn-success">View Profile</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
