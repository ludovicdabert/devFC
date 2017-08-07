<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRobotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robots', function (Blueprint $table) {
            $table->increments('id');// UNSIGNED INTEGER PRIMARY KEY AUTO INCREMENT 
            $table->unsignedInteger('user_id')->nullable(); // INT UNSIGNED NULL
            $table->string('name', 100); // VARCHAR(100) NOT NULL
            $table->text('description'); // TEXT SQL NOT NULL
            $table->dateTime('published_at')->default(\Carbon\Carbon::now()); // DATE TIME NOT NULL 0000-00-00 00:00:00
            $table->enum('status', ['published', 'unpublished', 'draft'])->default('unpublished');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
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
        Schema::dropIfExists('robots');
    }
}
