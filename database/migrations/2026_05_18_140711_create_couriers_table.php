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
        Schema::create('couriers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('employee_code', 6)->unique();
            $table->string('full_name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone_number', 50)->unique();
            $table->enum('level', [1, 2, 3, 4, 5]);
            $table->enum('status', ['active', 'inactive', 'suspended', 'on_leave'])->default('active');
            $table->enum('employment_type', ['internal', 'vendor', 'freelance'])->default('internal');
            $table->timestamp('joined_date')->default(now());
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
