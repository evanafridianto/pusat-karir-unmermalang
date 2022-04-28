<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seekers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('logo', 50)->nullable();
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('marital_status', ['Single', 'Married']);
            // $table->string('cv', 50)->nullable();
            $table->string('telp');
            $table->string('website', 100)->nullable();
            $table->mediumText('description')->nullable();
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
        Schema::dropIfExists('seekers');
    }
}