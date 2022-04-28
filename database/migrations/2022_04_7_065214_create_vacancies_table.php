<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('job_title', 100);
            $table->string('slug', 150);
            $table->longText('description');
            $table->enum('job_type', ['Permanent-employment', 'Fixed-term', 'Part-time', 'Outsourcing', 'Internship']);
            $table->dateTime('expiry_date');
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
        Schema::dropIfExists('vacancies');
    }
}