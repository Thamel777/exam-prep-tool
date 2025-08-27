<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();      // student
            $table->foreignId('lecturer_id')->constrained()->cascadeOnDelete();  // your lecturers table

            $table->string('title');
            $table->text('description')->nullable();

            $table->dateTime('scheduled_at');
            $table->unsignedSmallInteger('duration_minutes')->default(60);

            $table->string('status')->default('pending');  // pending|approved|rejected|cancelled
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('approved_at')->nullable();
            $table->text('rejection_reason')->nullable();

            $table->timestamps();

            $table->index(['lecturer_id', 'scheduled_at']);
            $table->index(['user_id', 'scheduled_at']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('meetings');
    }
};
