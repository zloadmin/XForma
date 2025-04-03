<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('result_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('result_id');
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('point_accuracy');
            $table->unsignedBigInteger('point_consistency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_tasks');
    }
};
