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
            $table->string('debtors_id');
            $table->string('debtors_phone');
            $table->text('debtors_id_image');
            $table->string('type');
            $table->string('per');
            $table->string('total_debts')->default(0)->nullable();
            $table->timestamps();
        });

      

        Schema::create('g_debtors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id');
            $table->string('g_name')->nullable();
            $table->string('g_address')->nullable();
            $table->string('g_id')->nullable();
            $table->string('g_phone')->nullable();
            $table->text('g_id_image')->nullable();
            $table->foreign('debt_id')->references('id')->on('debtors')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('debt_rounds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id');
            $table->string('title')->nullable();
            $table->decimal('round_amount', 10, 2)->default(0);
            $table->decimal('round_interest', 10, 2)->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
            $table->foreign('debt_id')->references('id')->on('debtors')->onDelete('cascade');
        });

    
        Schema::create('remarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id')->nullable();
            $table->unsignedBigInteger('debt_rounds_id')->nullable();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
            $table->foreign('debt_id')->references('id')->on('debtors')->nullable();
            $table->foreign('debt_rounds_id')->references('id')->on('debt_rounds')->nullable();
     
        });
        

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id')->nullable();
            $table->unsignedBigInteger('debt_rounds_id')->nullable();
            $table->date('end_date');
            $table->decimal('total_price', 10, 2);
            $table->decimal('amount', 10, 2)->default(0);
            $table->datetime('created_at');
            $table->datetime('updated_at')->default(null);
            $table->foreign('debt_id')->references('id')->on('debtors')->nullable();
            $table->foreign('debt_rounds_id')->references('id')->on('debt_rounds')->nullable();
     
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id');
            $table->unsignedBigInteger('debt_rounds_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->timestamps();
            $table->foreign('debt_id')->references('id')->on('debtors')->onDelete('cascade');
            $table->foreign('debt_rounds_id')->references('id')->on('debt_rounds')->nullable();
        });


        Schema::create('dd_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id');
            $table->unsignedBigInteger('debt_rounds_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->timestamps();
            $table->foreign('debt_id')->references('id')->on('debtors')->onDelete('cascade');
            $table->foreign('debt_rounds_id')->references('id')->on('debt_rounds')->nullable();
        });

        Schema::create('summarys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id');
            $table->unsignedBigInteger('debt_rounds_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->decimal('amount_d', 10, 2);
            $table->timestamps();
            $table->foreign('debt_id')->references('id')->on('debtors')->onDelete('cascade');
            $table->foreign('debt_rounds_id')->references('id')->on('debt_rounds')->nullable();
        });

        
        Schema::create('transitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id');
            $table->unsignedBigInteger('debt_rounds_id')->nullable();
            $table->string('count_date_stuck');
            $table->string('interest_value');
            $table->decimal('interest_month', 10, 2);
            $table->decimal('interest_date', 10, 2);
            $table->decimal('interest_total', 10, 2);
            $table->foreign('debt_id')->references('id')->on('debtors')->onDelete('cascade');
            $table->foreign('debt_rounds_id')->references('id')->on('debt_rounds')->nullable();
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
