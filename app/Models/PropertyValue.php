<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyValue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['userable_id', 'userable_type', 'property_id', 'content'];

    public function property()
    {
        return $this->belongsTo(SportProperty::class, 'property_id');
    }

    public function userable()
    {
        return $this->morphTo();
    }
}
