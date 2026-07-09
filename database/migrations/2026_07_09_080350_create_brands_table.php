<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 50)->unique();
            $table->string('domain', 255)->nullable()->unique();
            $table->string('logo', 255)->nullable();
            $table->string('favicon', 255)->nullable();
            $table->json('theme_settings')->nullable(); // { "primary": "#f97316", "font": "Inter" }
            $table->json('business_settings')->nullable(); // { "min_dp_percentage": 50 }
            $table->json('operating_hours')->nullable(); // { "monday": { "open": "09:00", "close": "22:00" } ... }
            $table->char('currency', 3)->default('IDR');
            $table->string('timezone', 50)->default('Asia/Jakarta');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
