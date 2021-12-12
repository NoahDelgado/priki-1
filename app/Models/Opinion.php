<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'user_opinion')->withPivot('comments', 'points');
    }

    public function upvotes()
    {
        return $this->comments()->wherePivot('points', '>', 0)->count();
    }
    public function downvotes()
    {
        return $this->comments()->wherePivot('points', '<', 0)->count();
    }
}
