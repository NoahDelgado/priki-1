<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function publicationState()
    {
        return $this->belongsTo(PublicationState::class);
    }

    /**
     * Selection of published practices
     * @return mixed
     */
    static function published()
    {
        return self::whereHas('publicationState', function ($q) {
            $q->where('slug', 'PUB');
        });
    }

    /**
     * All published practices
     * @return mixed
     */
    static function allPublished() {
        return self::published()->get();
    }

    /**
     * Returns all practices that have been modified within the last nbDays and that are in published state
     * @param $nbDays
     * @return mixed
     */
    static function publishedAndRecentlyUpdated($nbDays)
    {
        return self::published()->where('updated_at', '>=', Carbon::now()->subDays($nbDays))->get();
    }

}
