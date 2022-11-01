<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->constrained()->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone');
            $table->integer('adress');
            $table->date('birthdate')->nullable();
            $table->date('date_hired')->nullable();
            $table->string('image');
            $table->foreign('position_id')->references('id')->on('position')
            ->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
};
