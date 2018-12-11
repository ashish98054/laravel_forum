@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-5">
                <div class="card-header">{{ $thread->title }}</div>
                <div class="card-body">{{ $thread->body }}</div>
            </div>

            @if (auth()->check())
            <form method="POST" action="{{ route('replies.store', $thread->id)}}" style="margin-bottom: 25px;">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endif

            <fieldset>
                <legend>All replies</legend>
                @foreach ($thread->replies as $reply)
                    @include('threads/reply')
                @endforeach
            </fieldset>

        </div>
    </div>

</div>
@endsection
