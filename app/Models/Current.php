<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Current extends Model
{
    use HasFactory;

    protected $fillable = ['sensor_id', 'volt', 'ampere', 'power'];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
