<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'firstName',
        'lastName',
        'imageUri',
        'jerseyNo',
        'team_id',
        'player_history',
        'country_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the team of players.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
