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
        Schema::create('student', function (Blueprint $table) {
            $table->bigInteger('enrollment_no')->primary();
            $table->string('student_name');
            $table->string('email');
            $table->string('contact_no', 10);
            $table->string('course');
            $table->tinyInteger('semester');
            $table->string('section', 1);
            $table->decimal('tenth_percentage', 4, 2);
            $table->decimal('twelth_percentage', 4, 2);
            $table->decimal('graduation_percentage', 4, 2);
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
