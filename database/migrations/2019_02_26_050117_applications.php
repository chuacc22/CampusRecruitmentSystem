<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Applications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments(’id’);
            $table->string(’firstName’,20 )->index();
            $table->string(’lastName’, 40)->index();
            $table->string(’email’, 60)->index();
            $table->string(’mobileNo’,11)->index();
            $table->text(’address’)->nullable();
            $table->string(’pdfFile’)->index();
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
        Schema::dropIfExists('applications');
    }
}
