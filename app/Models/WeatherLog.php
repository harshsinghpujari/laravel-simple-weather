<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeatherLog extends Model
{
    use HasFactory;

    protected $fillable = ['city_name', 'temperature', 'condition'];

    public function getTempFahrenheitAttribute() {

        return ($this->temperature * 9/5) +32;
    }

    public function scopeHot($query)
    {
        return $query->where('temperature', '>', 30);
    }
}
