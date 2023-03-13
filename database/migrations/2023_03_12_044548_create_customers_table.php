<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('customers', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name', 100);
        //     $table->bigInteger('mobile')->unique();
        //     $table->string('email', 100)->nullable();
        //     $table->string('gender', 10);
        //     $table->boolean('is_married')->default(false);
        //     $table->boolean('status')->default(false);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
