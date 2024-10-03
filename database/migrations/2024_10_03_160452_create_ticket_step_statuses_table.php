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
        Schema::create('ticket_step_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_step_id');
            $table->foreign('ticket_step_id')->references('id')->on('ticket_steps')->onDelete('cascade');
            $table->string('name');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_step_statuses');
    }
};
