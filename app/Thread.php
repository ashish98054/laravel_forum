<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function path(): string
    {
        return "threads/{$this->channel->slug}/{$this->id}";
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function addReply(array $data)
    {
        $this->replies()->create($data);
    }
}