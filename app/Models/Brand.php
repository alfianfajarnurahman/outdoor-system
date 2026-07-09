<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name', 'slug', 'domain', 'logo', 'favicon',
        'theme_settings', 'business_settings', 'operating_hours',
        'currency', 'timezone', 'is_active'
    ];

    protected $casts = [
        'theme_settings' => 'array',
        'business_settings' => 'array',
        'operating_hours' => 'array',
        'is_active' => 'boolean',
    ];

    // Relasi: Brand memiliki banyak produk, rental, dll
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    // Helper: mendapatkan jam operasional hari ini
    public function getTodayOperatingHours(): ?array
    {
        $day = strtolower(now()->format('l')); // monday, tuesday, etc.
        return $this->operating_hours[$day] ?? null;
    }
}
