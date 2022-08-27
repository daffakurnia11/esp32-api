<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetPoint extends Model
{
    use HasFactory;

    protected $fillable = ['sensor_id', 'warning', 'danger'];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
