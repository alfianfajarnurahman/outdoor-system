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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('group', 50); // payment, notification, theme
            $table->string('key', 100);
            $table->json('value');
            $table->boolean('is_editable')->default(true);
            $table->timestamps();

            $table->unique(['brand_id', 'group', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
