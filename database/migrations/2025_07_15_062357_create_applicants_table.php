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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
        $table->string('full_name');
        $table->string('email');
        $table->string('phone');
        $table->string('linkedin')->nullable();
        $table->text('education');   // JSON or long text
        $table->text('experience');  // JSON or long text
        $table->text('skills');      // JSON or comma-separated
        $table->text('cover_letter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
