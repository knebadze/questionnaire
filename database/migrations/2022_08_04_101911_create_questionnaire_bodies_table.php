<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_bodies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionnaire_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_type');
            $table->string('unit');
            $table->string('base_month');
            $table->string('previous_month');
            $table->string('current_month');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaire_bodies');
    }
};
