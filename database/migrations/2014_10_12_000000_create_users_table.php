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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('debtors', function (Blueprint $table) {
            $table->id();
            $table->string('debtors_name');
            $table->string('debtors_address');
            $table->string('debtors_phone');
            $table->string('debtors_id_image');

            $table->string('g_name')->nullable();
            $table->string('g_address')->nullable();
            $table->string('g_phone')->nullable();
            $table->string('g_id_image')->nullable();
         
            $table->string('type');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
       
    }
};
