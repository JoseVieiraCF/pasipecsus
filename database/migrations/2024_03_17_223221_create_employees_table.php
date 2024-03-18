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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_role_id')->constrained();
            $table->string('name');
            $table->char('cpf',20);
            $table->date('birthday');
            $table->char('sex',2);
            $table->char('sus_card',50);
            $table->char('phone',14);
            $table->date('admission');
            $table->string('address');
            $table->foreignId('ubs_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
