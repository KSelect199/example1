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
        Schema::create('tariff_plans', function (Blueprint $table) {
            $table->id();
            $table->string('tarif_plan_name');
            $table->float('minutes');
            $table->integer('sms');
            $table->unsignedInteger('price');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariff_plans');
    }
};
