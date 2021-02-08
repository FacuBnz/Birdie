@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-7">

            @include('includes.message')
            @include('includes.newPost')
            @include('includes.allPosts')

            {{ $posts->links() }}
        </div>

    </div>
</div>
@endsection
