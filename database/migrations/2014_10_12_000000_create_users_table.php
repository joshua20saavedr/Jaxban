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
        Schema::create('users', function (Blueprint $table) {
            // Primary key
            $table->id();

            // User's full name
            $table->string('name');

            // User's email (must be unique)
            $table->string('email')->unique();

            // Username (must be unique)
            $table->string('username')->unique();

            // Email verification timestamp (nullable)
            $table->timestamp('email_verified_at')->nullable();

            // User's password (hashed)
            $table->string('password');

            // Remember token for "Remember Me" functionality in authentication
            $table->rememberToken();

            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the users table if this migration is rolled back
        Schema::dropIfExists('users');
    }
};
