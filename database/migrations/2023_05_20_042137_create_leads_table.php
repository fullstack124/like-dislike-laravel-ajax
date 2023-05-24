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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('platform')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('full_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->longText('message')->nullable();
            $table->string('product_name')->nullable();
            $table->string('job_id')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('depth')->nullable();
            $table->string('unit')->nullable();
            $table->string('material')->nullable();
            $table->string('printing')->nullable();
            $table->string('finishing')->nullable();
            $table->string('options')->nullable();
            $table->string('add_ons')->nullable();
            $table->longText('project')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->json('tracking_id')->nullable();
            $table->json('tracking_service')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
