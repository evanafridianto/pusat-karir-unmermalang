<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seeker_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->mediumText('message')->nullable();
            $table->enum('status', ['Accepted', 'Rejected', 'Pending'])->default('Pending');
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
        Schema::dropIfExists('applicants');
    }
}