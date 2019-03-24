<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InboxMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxMessages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('studentID', 7)->unique();
            $table->char('id', 7)->unique();
            $table->text('letterDesc');
            $table->text('pdfFile')->nullable();
            $table->timestamps(); //include created at & updated at (use updated at for checking the date)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inboxMessages');
    }
}
