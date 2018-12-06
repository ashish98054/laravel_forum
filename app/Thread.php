<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function path(): string
    {
        return route('threads.show', $this->id);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
