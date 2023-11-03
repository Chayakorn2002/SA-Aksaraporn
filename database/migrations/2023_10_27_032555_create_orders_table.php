<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('order_name', 100);
            $table->double('total_price')->default(0);
            $table->string('order_status', 100)->default('pending')->comment('pending, confirmed, processing, completed');
            
            // user's information for each orders
            $table->string('order_address', 100)->nullable();
            $table->string('order_phone', 100)->nullable();
            $table->string('order_email', 100)->nullable();
            $table->string('order_payment_transaction_image_url', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
