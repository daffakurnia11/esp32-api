<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vibration extends Model
{
    use HasFactory;

    protected $fillable = ['sensor_id', 'x_axis', 'y_axis', 'z_axis'];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
