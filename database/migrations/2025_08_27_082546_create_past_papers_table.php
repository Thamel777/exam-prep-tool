<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('past_papers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->cascadeOnDelete();
            $table->smallInteger('year');
            $table->enum('session', ['Feb/Mar','May/Jun','Oct/Nov','OnDemand']);
            $table->enum('type', ['QP','MS','ER','Specimen','Insert','Syllabus','Notes']);
            $table->string('paper_code')->nullable();    // e.g., 9709
            $table->string('variant')->nullable();       // e.g., 13
            $table->string('title');                     // human friendly
            $table->string('file_disk')->default('public');
            $table->string('file_path');                 // papers/OL/maths/2025/....
            $table->unsignedBigInteger('file_size')->default(0);
            $table->string('checksum')->nullable();
            $table->boolean('is_published')->default(true);
            $table->foreignId('uploaded_by')->constrained('users')->cascadeOnDelete();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->unique(['subject_id','year','session','type','paper_code','variant'],'paper_unique');
            $table->index(['subject_id','year','session','type']);
        });
    }

};
