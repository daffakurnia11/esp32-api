<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = ['plant_name', 'plant_type', 'sensor'];

    public function setpoint()
    {
        return $this->hasOne(SetPoint::class);
    }

    public function temperature()
    {
        return $this->hasMany(Temperature::class);
    }

    public function vibration()
    {
        return $this->hasMany(Vibration::class);
    }

    public function current()
    {
        return $this->hasMany(Current::class);
    }
}
