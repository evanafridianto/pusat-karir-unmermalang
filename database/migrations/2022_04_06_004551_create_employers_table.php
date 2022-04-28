<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 150);
            $table->string('since', 20);
            $table->string('logo', 50)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('website', 100)->nullable();
            $table->string('telp');
            $table->string('tin', 150);
            $table->enum('business_scale', ['Micro', 'Small', 'Medium', 'Big']);
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('number_of_employee', 100);

            $table->enum('status', ['Verified', 'Pending'])->default('Pending');
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
        Schema::dropIfExists('employers');
    }
}