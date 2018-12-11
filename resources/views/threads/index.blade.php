@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($threads as $thread)
            <div class="card mb-5">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a> posted <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                </div>
                <div class="card-body">{{ $thread->body }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
