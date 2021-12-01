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
     * Returns all practicies that have been modified within the last nbDays and that are in published state
     * @param $nbDays
     * @return mixed
     */
    static function publishedModifiedOnes($nbDays)
    {
        return self::where('updated_at', '>=', Carbon::now()->subDays($nbDays))
            ->whereHas('publicationState', function ($q) {
                $q->where('slug','PUB');
            })->get();
    }
}
