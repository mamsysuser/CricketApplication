<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'logoUri',
        'club_state',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the players for the team.
     */
    public function match()
    {
        return $this->belongsTo(Match::class);
    }

    /**
     * Get the players for the team.
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    /**
     * Get the points for the team.
     */
    public function teampoints()
    {
        return $this->hasMany(TeamPoints::class);
    }
}
