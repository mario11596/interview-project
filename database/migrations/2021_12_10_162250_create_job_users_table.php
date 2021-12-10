<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned(); 
            $table->integer('job_id')->unsigned(); 
            $table->timestamps();

            $table->foreign('job_id')
                ->references('id')->on('jobs')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_users');
    }
}
