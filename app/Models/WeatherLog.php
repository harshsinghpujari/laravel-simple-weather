<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherLog extends Model
{
    protected $fillable = ['city_name', 'temperature', 'condition'];

    public function getTempFahrenheitAttribute() {

        return ($this->temperature * 9/5) +32;
    }

    public function scopeHot($query)
    {
        return $query->where('temperature', '>', 30);
    }
}
