<?php

use App\Enums\TicketStepAction\ActionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->unsignedBigInteger('ticket_step_id');
            $table->foreign('ticket_step_id')->references('id')->on('ticket_steps')->onDelete('cascade');
            $table->unsignedBigInteger('ticket_step_action_id')->nullable();
            $table->foreign('ticket_step_action_id')->references('id')->on('ticket_step_actions')->onDelete('cascade');
            $table->enum('ticket_step_action_type', ActionType::values())->nullable();
            $table->integer('points')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_answers');
    }
};
