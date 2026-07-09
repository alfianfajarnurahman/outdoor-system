<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['brand_id', 'group', 'key', 'value', 'is_editable'];

    protected $casts = ['value' => 'array', 'is_editable' => 'boolean'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Helper: ambil nilai setting
    public static function getValue(string $key, ?int $brandId = null, $default = null)
    {
        $brandId = $brandId ?? (app('current_brand')->id ?? null);
        if (!$brandId) return $default;

        $setting = self::where('brand_id', $brandId)->where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}
