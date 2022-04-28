<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeker_education', function (Blueprint $table) {
            $table->foreignId('seeker_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('last_education', ['S2', 'S1', 'D4', 'D3', 'D2', 'D1']);
            $table->string('major', 50);
            // $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('institute_name', 255);
            $table->string('graduation_year', 10);
            $table->string('gpa', 20)->nullable();
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
        Schema::dropIfExists('seeker_education');
    }
}