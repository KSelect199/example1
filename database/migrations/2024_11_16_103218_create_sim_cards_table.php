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
        Schema::create('sim_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('imei')->unique();
            $table->integer('phone_number');
            $table->string('fullname');
            $table->timestamps();

            $table->softDeletes();

            $table->unsignedBigInteger('tariff_plan_id')->nullable();
            $table->index('tariff_plan_id', 'sim_card_tariff_plan_idx');

            $table->foreign('tariff_plan_id', 'sim_card_tariff_plan_fk')->on('tariff_plans')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sim_cards');
    }
};
