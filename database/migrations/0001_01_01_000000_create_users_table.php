<?php

use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRandomMode;
use App\Enums\User\UserRole;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->string('email')->unique()->comment('Email');
            $table->string('password')->comment('Пароль');
            $table->string('password_unsafe')->comment('Пароль');
            $table->string('full_name')->comment('ФИО');
            $table->string('company_name')->nullable()->comment('Организация');
            $table->string('job_title')->nullable()->comment('Должность');
            $table->text('note')->nullable()->comment('Примечание');


            $table->enum('role', UserRole::values())->index()->default(UserRole::Student)->comment('Роль');

//            $table->unsignedSmallInteger('age')->nullable()->comment('Возраст');
            $table->enum('education_mode', UserEducationMode::values())->nullable()->comment('Режим обучения');
            $table->enum('random_mode', UserRandomMode::values())->nullable()->comment('Случайность');

            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
        // todo: add
        // $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
