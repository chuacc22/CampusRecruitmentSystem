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
            $table->increments(’employerID’);
            $table->string(’companyName’,50 )->index();
            $table->string(’companyWeb’, 100)->index();
            $table->string(’companyRegNo’, 15)->index();
            $table->text(’jobDesc’)->index();
            $table->text(’Requirement’)->nullable();
            $table->text(’lookingFor’)->index();
            $table->text(’companyOverview’)->index();
            $table->text(’companySnapshot’)->index();
            $table->text(location’)->index();
            $table->string(’contactUs’, 30)->index();
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
