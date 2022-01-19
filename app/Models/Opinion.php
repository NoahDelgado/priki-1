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

    /**
     * Comments registered about an opinion
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comments()
    {
        return $this->belongsToMany(User::class, 'user_opinion')->withPivot('comment', 'points');
    }

    public function isCommentedBy(User $user)
    {
        return false;
    }

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    /**
     * Sum of all upvotes (assumption is made that upvote is one point)
     * @return int
     */
    public function upvotes()
    {
        return $this->comments()->wherePivot('points', '>', 0)->count();
    }

    /**
     * Sum of all downvotes (assumption is made that downvote is one point)
     * @return int
     */
    public function downvotes()
    {
        return $this->comments()->wherePivot('points', '<', 0)->count();
    }

    /**
     * References
     */
    public function references() {
        return $this->belongsToMany(Reference::class);
    }
}
