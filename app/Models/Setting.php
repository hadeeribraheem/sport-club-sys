<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['default_sport_id', 'max_users_per_team'];

    public function defaultSport()
    {
        return $this->belongsTo(SportType::class, 'default_sport_id');
    }
}
