<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function path(): string
    {
        return route('threads.show', ['thread' => $this->id]);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
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