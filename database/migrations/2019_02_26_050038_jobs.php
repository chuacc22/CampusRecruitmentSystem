<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('companyName',50 )->index();
            $table->string('companyWeb', 100)->index();
            $table->string('companyRegNo', 15)->index();
            $table->text('jobDesc');
            $table->text('Requirement');
            $table->text('lookingFor');
            $table->text('companyOverview');
            $table->text('companySnapshot');
            $table->text('location');
            $table->string('contactUs', 30);
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
        Schema::dropIfExists('jobs');
    }
}
