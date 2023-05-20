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
        Schema::create('companies_courses', function (Blueprint $table) {
            $table->integer('company_no')->nullable();
            $table->foreign('company_no')->references('c_no')->on('companies')->onDelete('cascade');
            $table->integer('course_id')->nullable();
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_course');
    }
};
