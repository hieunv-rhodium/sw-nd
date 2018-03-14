<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNghiepdoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nghiepdoans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone',100);
            $table->string('website',100);
            $table->string('recipient',100);
            $table->string('department',100);
            $table->integer('company');
            $table->date('day_of_receipt');
            $table->date('expiration_date');
            $table->string('status',50);
            $table->string('job_assigner',100);
            $table->string('note');
            $table->integer('legal');
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
        Schema::dropIfExists('nghiepdoans');
    }
}
