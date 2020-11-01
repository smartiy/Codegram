@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            @if (isset($user->profile->image))
                <img src="/storage/{{ $user->profile->image }}" class="rounded-circle" style="height: 200px;">
            @else
                <img src="/images/noimage.png" style="height: 190px; width: 200px;">
            @endif
        </div>
        <div class="col-9 pt-5" style="padding-left: 60px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <h1>{{ $user->username }}</h1>

                    @if (Auth::user()->id !== $user->id)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endif

                </div>

                @can('update', $user->profile)
                    <a href="{{ route('post.create') }}">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
                <a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><span style="font-weight: bold;" class="font-weight-bold">{{ $postCount }}</span> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
        <div class="pt-4 font-weight-bold">{{ $user->profile->title}}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">

        @foreach ($user->posts as $post)

        <div class="col-4 pb-4">
            <a href="{{ route('post.show', $post) }}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
        </div>

        @endforeach

    </div>
</div>
@endsection
