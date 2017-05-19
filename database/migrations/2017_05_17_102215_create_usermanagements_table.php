<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermanagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermanagements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->integer('usergroup_id');
            $table->string('password');
            $table->integer('status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usermanagements');
    }
}
