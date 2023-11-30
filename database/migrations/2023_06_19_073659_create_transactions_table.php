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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('reference_id');
            $table->string('invoice_no');
            $table->string('payment_method');
            $table->enum('payment_status', ['PENDING', 'SUCCEEDED', 'CANCELED', 'UNKNOWN'])->default('PENDING');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('message')->nullable();
            $table->foreignId('unit_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('page_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('email');
            $table->integer('quantity');
            $table->boolean('is_anonymous')->default(false);
            $table->integer('price');
            $table->integer('total');
            $table->text('qr');
            $table->text('link_qr');
            $table->timestamp('expired_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
