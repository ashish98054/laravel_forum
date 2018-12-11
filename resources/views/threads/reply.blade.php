<div class="card mb-5">
    <div class="card-header">
        <a href="#">{{ $reply->owner->name }}</a> posted {{ $reply->created_at->diffForHumans() }}
    </div>
    <div class="card-body">
        {{ $reply->body }}
    </div>
</div>