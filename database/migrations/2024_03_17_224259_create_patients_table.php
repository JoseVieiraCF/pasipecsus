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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('cpf',20);
            $table->char('sus_card',100);
            $table->char('phone',50);
            $table->char('sex',2);
            $table->string('address',50);
            $table->boolean('hypertensive');
            $table->boolean('diabetic');
            $table->boolean('pregnant');
            $table->boolean('cancer');
            $table->foreignId('ubs_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
