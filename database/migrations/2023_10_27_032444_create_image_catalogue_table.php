<?php

use App\Models\Product;
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
        Schema::create('image_catalogue', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(Product::class);
            $table->string('image_name', 100);
            $table->text('image_description')->nullable();
            $table->string('image_url', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_catalogue');
    }
};
