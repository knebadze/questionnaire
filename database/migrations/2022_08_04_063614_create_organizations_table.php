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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('identification_code');
            $table->string('name');
            $table->string('address_l');
            $table->string('address_a');
            $table->foreignId('region_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('district');
            $table->string('ownership');
            $table->string('legal_form');
            $table->string('type_of_economic');
            $table->string('head');
            $table->string('number');
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
        Schema::dropIfExists('organizations');
    }
};
