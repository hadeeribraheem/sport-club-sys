<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SportProperty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sport_id', 'name', 'input_type', 'type'];

    public function sportType()
    {
        return $this->belongsTo(SportType::class, 'sport_id');
    }

    public function propertyValues()
    {
        return $this->hasMany(PropertyValue::class,'property_id');
    }
}
