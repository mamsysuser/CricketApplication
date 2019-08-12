<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerHistory extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'player_id',
        'matches',
        'runs',
        'highest_score',
        'hundreds',
        'fifties',
        'wickets',
    ];

    /**
     * Get the player of history.
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}