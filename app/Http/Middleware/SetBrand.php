<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\View;

class SetBrand
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        // 1. Coba cari berdasarkan domain penuh (untuk production)
        $brand = Brand::where('domain', $host)->first();

        // 2. Jika tidak ketemu, coba berdasarkan subdomain (slug)
        if (!$brand) {
            $subdomain = explode('.', $host)[0] ?? null;
            if ($subdomain) {
                $brand = Brand::where('slug', $subdomain)->first();
            }
        }

        // 3. Jika tetap tidak ketemu, kita fallback ke brand default (misal Fourteen)
        // Atau kita lempar 404 agar jelas.
        if (!$brand) {
            // Ambil default (misal id=1)
            $brand = Brand::where('is_active', true)->first();
        }

        if (!$brand) {
            abort(404, 'Brand tidak ditemukan.');
        }

        // Simpan brand di Service Container Laravel agar bisa diakses global
        app()->instance('current_brand', $brand);

        // Share ke semua view (agar bisa dipakai di Blade)
        View::share('currentBrand', $brand);

        return $next($request);
    }
}
