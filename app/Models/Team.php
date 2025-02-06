<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'sport_type_id', 'status', 'players_limit', 'coach_id', 'captain_id','players_count'];

    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    public function sportType()
    {
        return $this->belongsTo(SportType::class, 'sport_type_id');
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function captain()
    {
        return $this->belongsTo(User::class, 'captain_id');
    }

    public function players()
    {
        return $this->hasMany(User::class, 'team_id')->whereNull('deleted_at');
    }

}
