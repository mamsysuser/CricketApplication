<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamPoints extends Model
{
   
    protected $fillable = [
        'match_id',
        'team_id',
        'points',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the team for a point.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
