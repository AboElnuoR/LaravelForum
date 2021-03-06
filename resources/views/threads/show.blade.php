@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a>{{ $thread->creator->name }}</a> said:
                        {{ $thread->title }}</div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a>{{ $reply->owner->name }}</a> said
                            {{ $reply->created_at->diffForHumans() }} ...
                        </div>

                        <div class="panel-body">
                            {{ $reply->body }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(auth()->check())
                    <form method="post" action="{{ $thread->path() . '/replies' }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" class="form-control" placeholder="Type a reply ..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Reply</button>
                    </form>
                @else
                    <p class="text-center">Please <a href="/login">login</a> to add a reply</p>
                @endif
            </div>
        </div>
    </div>
@endsection
