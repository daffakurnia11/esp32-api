<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    use HasFactory;

    protected $fillable = ['sensor_id', 'temperature', 'pressure', 'ambient'];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
