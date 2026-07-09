<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Fourteen Adventure
        Brand::create([
            'name' => 'Fourteen Adventure',
            'slug' => 'fourteen',
            'domain' => 'fourteen.localhost', // untuk testing lokal
            'theme_settings' => ['primary' => '#ef4444', 'secondary' => '#1e293b'],
            'business_settings' => ['min_dp_percentage' => 50],
            'operating_hours' => [
                'monday' => ['open' => '09:00', 'close' => '22:00'],
                'tuesday' => ['open' => '09:00', 'close' => '22:00'],
                'wednesday' => ['open' => '09:00', 'close' => '22:00'],
                'thursday' => ['open' => '10:00', 'close' => '22:00'],
                'friday' => ['open' => '09:00', 'close' => '22:00'],
                'saturday' => ['open' => '09:00', 'close' => '22:00'],
                'sunday' => ['open' => '09:00', 'close' => '22:00'],],
            'currency' => 'IDR',
            'timezone' => 'Asia/Jakarta',
            'is_active' => true,
        ]);

        // 2. Mamas Outdoor
        Brand::create([
            'name' => 'Mamas Outdoor',
            'slug' => 'mamas',
            'domain' => 'mamas.localhost', // untuk testing lokal
            'theme_settings' => ['primary' => '#3b82f6', 'secondary' => '#1e293b'],
            'business_settings' => ['min_dp_percentage' => 50],
            'operating_hours' => [
                'monday' => ['open' => '08:30', 'close' => '22:00'],
                'tuesday' => ['open' => '08:30', 'close' => '22:00'],
                'wednesday' => ['open' => '10:00', 'close' => '22:00'],
                'thursday' => ['open' => '08:30', 'close' => '22:00'],
                'friday' => ['open' => '08:30', 'close' => '22:00'],
                'saturday' => ['open' => '08:30', 'close' => '22:00'],
                'sunday' => ['open' => '08:30', 'close' => '22:00'],],
            'currency' => 'IDR',
            'timezone' => 'Asia/Jakarta',
            'is_active' => true,
        ]);

        // 3. Tetra Camp
        Brand::create([
            'name' => 'Tetra Camp',
            'slug' => 'tetra',
            'domain' => 'tetra.localhost', // untuk testing lokal
            'theme_settings' => ['primary' => '#22c55e', 'secondary' => '#1e293b'],
            'business_settings' => ['min_dp_percentage' => 50],
            'operating_hours' => [
                'monday' => ['open' => '08:30', 'close' => '22:00'],
                'tuesday' => ['open' => '08:30', 'close' => '22:00'],
                'wednesday' => ['open' => '10:00', 'close' => '22:00'],
                'thursday' => ['open' => '08:30', 'close' => '22:00'],
                'friday' => ['open' => '08:30', 'close' => '22:00'],
                'saturday' => ['open' => '08:30', 'close' => '22:00'],
                'sunday' => ['open' => '08:30', 'close' => '22:00'],],
            'currency' => 'IDR',
            'timezone' => 'Asia/Jakarta',
            'is_active' => true,
        ]);
    }
}
