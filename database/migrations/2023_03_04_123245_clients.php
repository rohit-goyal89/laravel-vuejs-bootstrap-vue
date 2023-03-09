<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade');
            $table->string('company_name')->unique();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('primary_name')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('secondary_name')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('other_name')->nullable();
            $table->string('other_email')->nullable();
            $table->string('other_phone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
