<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('email_id'); 
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('city');
            $table->string('mobile_number');
            $table->string('status');
            $table->string('OIB')->unique();
            $table->timestamps();

            $table->foreign('email_id')
                ->references('email')->on('users')
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
        Schema::dropIfExists('candidates');
    }
}
