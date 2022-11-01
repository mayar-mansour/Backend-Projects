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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            // $table->timestamp('date')->useCurrent();
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade');
            $table->time('time_in_out')->useCurrent();
            $table->string('check_in_out');
            // $table->time('time_out')->nullable();;
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
        Schema::dropIfExists('attendances');
    }
};
