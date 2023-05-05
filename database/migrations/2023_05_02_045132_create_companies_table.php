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
        Schema::create('companies', function (Blueprint $table) {
            $table->string('c_no', 6)->primary();
            $table->string('name_of_company');
            $table->string('website');
            $table->decimal('package', 4, 2);
            $table->decimal('tenth_eligibility_percentage', 4, 2);
            $table->decimal('twelth_eligibility_percentage', 4, 2);
            $table->decimal('graduation_eligibility_percentage', 4, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
