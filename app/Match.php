<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    public $timestamps = false;

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'match_title',
        'firstteam_id',
        'secondteam_id',
        'winningteam_id',
        'deleted_at',
    ];

    public function FirstTeam()
    {
        return $this->hasOne('App\Team', 'id', 'firstteam_id');
    }

    public function SecondTeam()
    {
        return $this->hasOne('App\Team', 'id', 'secondteam_id');
    }

    public function WinningTeam()
    {
        return $this->hasOne('App\Team', 'id', 'winningteam_id');
    }
}