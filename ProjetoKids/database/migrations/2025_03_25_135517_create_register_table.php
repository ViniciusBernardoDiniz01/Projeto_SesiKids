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
        Schema::create('register', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cpf')->unique();
            $table->string('date_of_birthday');
            $table->string('email')->unique();
            $table->string('ddd_phone');
            $table->string('phone_number');
            
            //endereço
            $table->string('address_street');
            $table->string('adress_number');
            $table->string('village');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('country');

            //data da criação e edição
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register');
    }
};
